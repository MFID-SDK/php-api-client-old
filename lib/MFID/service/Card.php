<?php

namespace MFID\service;

/**
 * Class Card
 * @package MFID\service
 *
 * @property ApiService $api
 */
class Card
{
    protected $api;

    public function __construct($parent)
    {
        $this->api = $parent;
    }

    public function listByMerchantId($merchant_id, $limit = null, $offset = null)
    {
        return $this->list_($merchant_id, null, null, $limit, $offset);
    }

    public function listByAddressId($address_id, $limit = null, $offset = null)
    {
        return $this->list_(null, $address_id, null, $limit, $offset);
    }

    public function listByIssuerId($issuer_id, $limit = null, $offset = null)
    {
        return $this->list_(null, null, $issuer_id, $limit, $offset);
    }

    public function list_($merchant_id = null, $address_id = null, $issuer_id = null, $limit = null, $offset = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/card.list', [
            'token'       => $api->token,
            'merchant_id' => $merchant_id,
            'address_id'  => $address_id,
            'issuer_id'   => $issuer_id,
            'limit'       => $limit,
            'offset'      => $offset,
        ]);

        return $data;
    }

    public function getByCardId($card_id)
    {
        return $this->get($card_id);
    }

    public function getByPan($pan)
    {
        return $this->get(null, $pan);
    }

    public function getByAdditionalKey($key_name, $key_value)
    {
        return $this->get(null,  null, $key_name, $key_value);
    }

    public function get($card_id = null, $pan = null, $key_name = null, $key_value = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/card.get', [
            'token'     => $api->token,
            'card_id'   => $card_id,
            'pan'       => $pan,
            'key_name'  => $key_name,
            'key_value' => $key_value,
        ]);

        return $data;
    }

    public function add($customer_id, $merchant_id, $address_id, $pan, $status = 0)
    {
        $api = $this->api;

        $data = $this->api->call('service/card.add', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'merchant_id' => $merchant_id,
            'address_id'  => $address_id,
            'pan'         => $pan,
            'status'      => $status,
        ]);

        return $data;
    }

    public function update($card_id, $status)
    {
        $api = $this->api;

        $data = $this->api->call('service/card.update', [
            'token'   => $api->token,
            'card_id' => $card_id,
            'status'  => $status,
        ]);

        return $data;
    }

    public function delete($card_id)
    {
        $api = $this->api;

        $data = $this->api->call('service/card.delete', [
            'token'   => $api->token,
            'card_id' => $card_id,
        ]);

        return $data;
    }

    public function merchantList($card_id, $limit = null, $offset = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/card.merchantList', [
            'token'   => $api->token,
            'card_id' => $card_id,
            'limit'   => $limit,
            'offset'  => $offset,
        ]);

        return $data;
    }
}