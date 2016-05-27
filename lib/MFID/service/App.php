<?php

namespace MFID\service;

/**
 * Class App
 * @package MFID\service
 *
 * @property ApiService $api
 */
class App
{
    protected $api;

    public function __construct($parent)
    {
        $this->api = $parent;
    }

    public function listByUserId($user_id)
    {
        return $this->list_($user_id);
    }

    public function listByType($type)
    {
        return $this->list_(null, $type);
    }

    public function list_($user_id = null, $type = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/app.list', [
            'token'   => $api->token,
            'user_id' => $user_id,
            'type'    => $type,
        ]);

        return $data;
    }

    public function get($app_id)
    {
        $api = $this->api;

        $data = $this->api->call('service/app.get', [
            'token'  => $api->token,
            'app_id' => $app_id,
        ]);

        return $data;
    }

    public function add($user_id, $type, $owner_id, $name, $description = '')
    {
        $api = $this->api;

        $data = $this->api->call('service/app.add', [
            'token'       => $api->token,
            'user_id'     => $user_id,
            'type'        => $type,
            'owner_id'    => $owner_id,
            'name'        => $name,
            'description' => $description,
        ]);

        return $data;
    }

    public function update($app_id, $name = null, $description = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/app.update', [
            'token'       => $api->token,
            'app_id'      => $app_id,
            'name'        => $name,
            'description' => $description,
        ]);

        return $data;
    }

    public function delete($app_id, $reason)
    {
        $api = $this->api;

        $data = $this->api->call('service/app.delete', [
            'token'  => $api->token,
            'app_id' => $app_id,
            'reason' => $reason,
        ]);

        return $data;
    }

    public function userList($app_id)
    {
        $api = $this->api;

        $data = $this->api->call('service/app.userList', [
            'token'  => $api->token,
            'app_id' => $app_id,
        ]);

        return $data;
    }

    public function userGet($user_id)
    {
        $api = $this->api;

        $data = $this->api->call('service/app.userGet', [
            'token'   => $api->token,
            'user_id' => $user_id,
        ]);

        return $data;
    }

    public function userAdd($app_id, $login, $password, $access)
    {
        $api = $this->api;

        $data = $this->api->call('service/app.userAdd', [
            'token'    => $api->token,
            'app_id'   => $app_id,
            'login'    => $login,
            'password' => $password,
            'access'   => $access,
        ]);

        return $data;
    }

    public function userUpdate($app_id, $password = null, $access = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/app.userUpdate', [
            'token'    => $api->token,
            'app_id'   => $app_id,
            'password' => $password,
            'access'   => $access,
        ]);

        return $data;
    }

    public function userDelete($user_id, $reason)
    {
        $api = $this->api;

        $data = $this->api->call('service/app.userDelete', [
            'token'   => $api->token,
            'user_id' => $user_id,
            'reason'  => $reason,
        ]);

        return $data;
    }
}