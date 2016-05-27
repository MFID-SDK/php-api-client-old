<?php

namespace MFID;

/**
 * Class User
 * @package MFID
 *
 * @property Api $api
 */
class User
{
    protected $api;

    public function __construct($parent)
    {
        $this->api = $parent;
    }

    public function auth ()
    {
        $api = $this->api;

        $auth = $this->api->call('user.auth', [
            'login'    => $api->login,
            'password' => $api->password,
            'app_hash' => $api->app_hash,
            'expires'  => $api->auth_expires,
        ]);

        if (!$auth) {
            return false;
        }

        $api->saveAuth($auth);

        return true;
    }

    public function renew ($expires = 0)
    {
        $api = $this->api;

        $auth = $this->api->call('user.renew', [
            'renew'   => $api->renew,
            'expires' => $expires ?: $api->auth_expires,
        ]);

        if (!$auth) {
            return false;
        }

        $auth['app_type'] = $api->app_type;
        $api->saveAuth($auth);

        return true;
    }

    public function clear()
    {
        $api = $this->api;

        $data = $this->api->call('user.clear', [
            'token' => $api->token,
        ]);

        if (!$data) {
            return false;
        }

        return true;
    }

    public function info()
    {
        $api = $this->api;

        $data = $this->api->call('user.info', [
            'token' => $api->token,
        ]);

        return $data;
    }

    public function accessSet ($ip)
    {
        $api = $this->api;

        $data = $this->api->call('user.accessSet', [
            'token' => $api->token,
            'ip'    => $ip
        ]);

        return $data;
    }

    public function accessGet()
    {
        $api = $this->api;

        $data = $this->api->call('user.accessGet', [
            'token' => $api->token,
        ]);

        return $data;
    }

    public function callbackSet($callback)
    {
        $api = $this->api;

        $data = $this->api->call('user.callbackSet', [
            'token'    => $api->token,
            'callback' => $callback
        ]);

        return $data;
    }

    public function callbackGet()
    {
        $api = $this->api;

        $data = $this->api->call('user.callbackGet', [
            'token'    => $api->token,
        ]);

        return $data;
    }

    public function eventStart($name, $callback)
    {
        $api = $this->api;

        $data = $this->api->call('user.eventStart', [
            'token'    => $api->token,
            'name'     => $name,
            'callback' => $callback
        ]);

        return $data;
    }

    public function eventStop($name)
    {
        $api = $this->api;

        $data = $this->api->call('user.eventStop', [
            'token'    => $api->token,
            'name'     => $name,
        ]);

        return $data;
    }

    public function eventStatus()
    {
        $api = $this->api;

        $data = $this->api->call('user.eventStatus', [
            'token'    => $api->token,
        ]);

        return $data;
    }
}