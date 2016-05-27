<?php

namespace MFID\service;

/**
 * Class Address
 * @package MFID\service
 *
 * @property ApiService $api
 */
class Address
{
    protected $api;

    public function __construct($parent)
    {
        $this->api = $parent;
    }

    public function list_($merchant_id, $limit = null, $offset = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/address.list', [
            'token'       => $api->token,
            'merchant_id' => $merchant_id,
            'limit'       => $limit,
            'offset'      => $offset,
        ]);

        return $data;
    }

    public function getByAddressId($address_id)
    {
        return $this->get($address_id);
    }

    public function getByYandexId($yandex_id)
    {
        return $this->get(null, $yandex_id);
    }

    public function get($address_id = null, $yandex_id = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/address.get', [
            'token'      => $api->token,
            'address_id' => $address_id,
            'yandex_id'  => $yandex_id,
        ]);

        return $data;
    }

    public function add($merchant_id, $yandex_id, $name, $description = '')
    {
        $api = $this->api;

        $data = $this->api->call('service/address.add', [
            'token'       => $api->token,
            'merchant_id' => $merchant_id,
            'yandex_id'   => $yandex_id,
            'name'        => $name,
            'description' => $description,
        ]);

        return $data;
    }

    public function update($address_id, $yandex_id = null, $name = null, $description = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/address.update', [
            'token'       => $api->token,
            'address_id'  => $address_id,
            'yandex_id'   => $yandex_id,
            'name'        => $name,
            'description' => $description,
        ]);

        return $data;
    }

    public function delete($address_id)
    {
        $api = $this->api;

        $data = $this->api->call('service/address.delete', [
            'token'      => $api->token,
            'address_id' => $address_id,
        ]);

        return $data;
    }
}