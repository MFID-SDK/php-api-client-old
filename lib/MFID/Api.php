<?php

namespace MFID;


use MFID\exception\Exception;
use MFID\exception\InvalidAuth;
use MFID\exception\InvalidConfig;
use MFID\exception\ServerError;
use MFID\merchant\ApiMerchant;
use MFID\service\ApiService;

/**
 * Class Api
 * @package MFID
 *
 * @property string $login
 * @property string $password
 * @property string $app_hash
 * @property string $auth_expires
 */
class Api
{
    public $user;

    public $error;

    protected $login;
    protected $password;
    protected $app_hash;
    protected $auth_expires;

    protected $load;
    protected $save;

    protected $url_prefix;

    public $token;
    public $renew;
    public $expires;
    public $app_type;

    protected static $default_url_prefix = 'https://dev.mfid.ru/';

    public function __construct($config, $auth)
    {
        Logger::write();
        $this->login        = $config['auth']['login'];
        $this->password     = $config['auth']['password'];
        $this->app_hash     = $config['auth']['app_hash'];
        $this->auth_expires = $config['auth']['expires'] ?: 0;

        if (array_key_exists('cache', $config)) {
            $this->load = $config['cache']['load'];
            $this->save = $config['cache']['save'];
        }
        if (array_key_exists('url', $config)) {
            $url = $config['url'];
            if (substr($url, -1) != '/') {
                $url .= '/';
            }
            $this->url_prefix = $url;
        } else {
            $this->url_prefix = static::$default_url_prefix;
        }

        $this->saveAuth($auth);

        $this->user = new User($this);
    }

    /**
     * @param array $config
     * @return ApiMerchant|ApiService
     * @throws Exception
     * @throws InvalidAuth
     * @throws InvalidConfig
     * @throws ServerError
     */
    public static function getInstance($config = [])
    {
        Logger::write();
        if (!$config || !is_array($config) || !array_key_exists('auth', $config)) {
            throw new InvalidConfig('invalid config');
        }

        foreach (['login', 'password', 'app_hash'] as $field) {
            if (!array_key_exists($field, $config['auth'])) {
                throw new InvalidConfig("missing required param config->auth->$field");
            }
        }

        if (array_key_exists('cache', $config)) {
            foreach (['load', 'save'] as $field) {
                if (!array_key_exists($field, $config['cache'])) {
                    throw new InvalidConfig("missing required param config->cache->$field");
                }
            }

            if (!is_callable($config['cache']['load'])) {
                throw new InvalidConfig("param config->cache->load must be callable");
            } else {
                $load = $config['cache']['load'];
            }

            if (!is_callable($config['cache']['save'])) {
                throw new InvalidConfig("param config->cache->save must be callable");
            }
        }

        $key = "MFID-auth:{$config['auth']['app_hash']}:{$config['auth']['login']}";

        if (isset($load)) {
            $auth = call_user_func($load, $key);
        }

        if (!isset($auth) || !$auth) {
            $url_prefix = isset($config['url']) ? $config['url'] : static::$default_url_prefix;

            if (substr($url_prefix, -1) != '/') {
                $url_prefix .= '/';
            }

            $auth = static::request($url_prefix . 'user.auth', $config['auth'])['response'];

            if (!$auth) {
                throw new ServerError('Server unavailable');
            }

            if (is_array($auth) && array_key_exists('error', $auth)) {
                throw new InvalidAuth('Invalid auth');
            }
        }

        $app_type = $auth['app_type'];

        if ($app_type == 1) {
            return new ApiService($config, $auth);
        } elseif ($app_type == 2) {
            return new ApiMerchant($config, $auth);
        } else {
            throw new Exception('Oops');
        }
    }

    public static function request($url, $data, $token = null)
    {
        $curl          = new Curl();
        /*if ($token) {
            $curl->setHeader('X-Auth-Token', $token);
        }/**/
        $response      = $curl->post($url, $data);
        $response_code = $curl->http_status_code;

        $curl->close();

        if ($response_code != 200) {
            return false;
        }

        return $response;
    }

    public function call($method, $data)
    {
        $response =  static::request($this->url_prefix . $method, $data);

        Logger::write([
            'call' => $method,
            'params' => $data,
            'response' => $response
        ]);
        if (!$response) {
            return $this->setError('server unavailable');
        }
        if (is_array($response) && array_key_exists('error', $response)) {
            if ($response['error']['code'] == 10301) { // Token expired
                $this->user->renew();
                return $this->call($method, $data);
            } elseif ($response['error']['code'] == 10401) { // Authorization required
                $this->user->auth();
                return $this->call($method, $data);
            }
            return $this->setError($response['error']);
        }

        return $response['response'];
    }

    public function saveAuth($auth)
    {
        if ($this->save) {
            call_user_func($this->save, "MFID-auth:{$this->app_hash}:{$this->login}", $auth);
        }

        $this->token    = $auth['token'];
        $this->renew    = $auth['renew'];
        $this->expires  = $auth['expires'];
        $this->app_type = $auth['app_type'];
        Logger::write($auth);
    }

    public function __get($name)
    {
        if (in_array($name, ['login', 'password', 'app_hash', 'auth_expires']))
        {
            return $this->$name;
        }
    }

    public function setError($error)
    {
        $this->error = $error;
        return false;
    }

    public static function eventCatcher(callable $callback)
    {
        if (!isset($_POST['event_id'], $_POST['name'], $_POST['data'])) {
            echo json_encode(['error' => 'xyz']);
        }

        $event = [
            'event_id'   => $_POST['event_id'],
            'event_name' => $_POST['name'],
            'event_data' => json_decode($_POST['data'], true)
        ];

        ob_start ();
        call_user_func($callback, $event);
        ob_end_clean ();

        echo json_encode(['success' => 1, 'event_id' => $event['event_id']]);
    }

    public static function r()
    {
        $x = func_get_args();
        echo "<pre>";
        print_r(count($x) == 1 ? $x[0] : $x);
        echo "</pre>";
    }
}