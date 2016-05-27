<?php

namespace MFID\service;

/**
 * Class Merchant
 * @package MFID\service
 *
 * @property ApiService $api
 */
class Merchant
{
    protected $api;

    public function __construct($parent)
    {
        $this->api = $parent;
    }

    public function list_($app_id = 0, $limit = null, $offset = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/merchant.list', [
            'token'  => $api->token,
            'app_id' => $app_id,
            'limit'  => $limit,
            'offset' => $offset,
        ]);

        return $data;
    }

    public function get($merchant_id)
    {
        $api = $this->api;

        $data = $this->api->call('service/merchant.get', [
            'token'       => $api->token,
            'merchant_id' => $merchant_id,
        ]);

        return $data;
    }

    public function add($name, $description = '')
    {
        $api = $this->api;

        $data = $this->api->call('service/merchant.add', [
            'token'       => $api->token,
            'name'        => $name,
            'description' => $description,
        ]);

        return $data;
    }

    public function update($merchant_id, $name = '', $description = '')
    {
        $api = $this->api;

        $data = $this->api->call('service/merchant.update', [
            'token'       => $api->token,
            'merchant_id' => $merchant_id,
            'name'        => $name,
            'description' => $description,
        ]);

        return $data;
    }

    public function delete($merchant_id)
    {
        $api = $this->api;

        $data = $this->api->call('service/merchant.delete', [
            'token'       => $api->token,
            'merchant_id' => $merchant_id,
        ]);

        return $data;
    }

    public function offerList($merchant_id, $address_id = 0)
    {
        $api = $this->api;

        $data = $this->api->call('service/merchant.offerList', [
            'token'       => $api->token,
            'merchant_id' => $merchant_id,
            'address_id'  => $address_id,
        ]);

        return $data;
    }

    public function offerAdd($merchant_id, $address_id, $offer_id, $weight = 0)
    {
        $api = $this->api;

        $data = $this->api->call('service/merchant.offerAdd', [
            'token'       => $api->token,
            'merchant_id' => $merchant_id,
            'address_id'  => $address_id,
            'offer_id'    => $offer_id,
            'weight'      => $weight,
        ]);

        return $data;
    }

    public function offerDelete($merchant_id, $address_id, $offer_id)
    {
        $api = $this->api;

        $data = $this->api->call('service/merchant.offerDelete', [
            'token'       => $api->token,
            'merchant_id' => $merchant_id,
            'address_id'  => $address_id,
            'offer_id'    => $offer_id,
        ]);

        return $data;
    }

    public function cardGet($merchant_id, $card_id)
    {
        $api = $this->api;

        $data = $this->api->call('service/merchant.cardGet', [
            'token'       => $api->token,
            'merchant_id' => $merchant_id,
            'card_id'     => $card_id,
        ]);

        return $data;
    }
}