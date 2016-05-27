<?php

namespace MFID\service;

/**
 * Class Customer
 * @package MFID\service
 *
 * @property ApiService $api
 */
class Customer
{
    protected $api;

    public function __construct($parent)
    {
        $this->api = $parent;
    }

    public function listByMerchantId($merchant_id, $limit = null, $offset = null)
    {
        return $this->list_($merchant_id, null, $limit, $offset);
    }

    public function listByAddressId($address_id, $limit = null, $offset = null)
    {
        return $this->list_(null, $address_id, $limit, $offset);
    }

    public function list_($merchant_id = null, $address_id = null, $limit = null, $offset = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/customer.list', [
            'token'       => $api->token,
            'merchant_id' => $merchant_id,
            'address_id'  => $address_id,
            'limit'       => $limit,
            'offset'      => $offset,
        ]);

        return $data;
    }

    public function getByCustomerId($customer_id)
    {
        return $this->get($customer_id);
    }

    public function getByPhone($phone)
    {
        return $this->get(null, $phone);
    }

    public function getByAdditionalKey($key_name, $key_value)
    {
        return $this->get(null, null, $key_name, $key_value);
    }

    public function get($customer_id = null, $phone = null, $key_name = null, $key_value = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/customer.get', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'phone'       => $phone,
            'key_name'    => $key_name,
            'key_value'   => $key_value,
        ]);

        return $data;
    }

    public function add($phone, $merchant_id = 0, $address_id = 0, $email = '', $name = '', $birthday = '')
    {
        $api = $this->api;

        $data = $this->api->call('service/customer.add', [
            'token'       => $api->token,
            'merchant_id' => $merchant_id,
            'address_id'  => $address_id,
            'phone'       => $phone,
            'email'       => $email,
            'name'        => $name,
            'birthday'    => $birthday,
        ]);

        return $data;
    }

    public function update($customer_id, $phone = null, $email = null, $name = null, $birthday = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/customer.update', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'phone'       => $phone,
            'email'       => $email,
            'name'        => $name,
            'birthday'    => $birthday,
        ]);

        return $data;
    }

    public function delete($customer_id, $reason)
    {
        $api = $this->api;

        $data = $this->api->call('service/customer.delete', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'reason'      => $reason,
        ]);

        return $data;
    }

    public function keyAdd($customer_id, $key_name, $key_value, $key_visual, $status = 0)
    {
        $api = $this->api;

        $data = $this->api->call('service/customer.keyAdd', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'key_name'    => $key_name,
            'key_value'   => $key_value,
            'key_visual'  => $key_visual,
            'status'      => $status,
        ]);

        return $data;
    }

    public function keyDelete($customer_id, $key_name, $key_value)
    {
        $api = $this->api;

        $data = $this->api->call('service/customer.keyDelete', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'key_name'    => $key_name,
            'key_value'   => $key_value,
        ]);

        return $data;
    }

    public function keyConfirm($customer_id, $key_name, $key_value, $status = 1)
    {
        $api = $this->api;

        $data = $this->api->call('service/customer.keyConfirm', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'key_name'    => $key_name,
            'key_value'   => $key_value,
            'status'      => $status,
        ]);

        return $data;
    }

    public function keyList($customer_id, $key_name = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/customer.keyList', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'key_name'    => $key_name,
        ]);

        return $data;
    }

    public function cardList($customer_id, $limit = null, $offset = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/customer.cardList', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'limit'       => $limit,
            'offset'      => $offset,
        ]);

        return $data;
    }

    public function marketList($customer_id)
    {
        $api = $this->api;

        $data = $this->api->call('service/customer.marketList', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
        ]);

        return $data;
    }

    public function merchantList($customer_id, $limit = null, $offset = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/customer.merchantList', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'limit'       => $limit,
            'offset'      => $offset,
        ]);

        return $data;
    }

    public function balanceGet($customer_id, $merchant_id, $address_id = 0)
    {
        $api = $this->api;

        $data = $this->api->call('service/customer.balanceGet', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'merchant_id' => $merchant_id,
            'address_id'  => $address_id,
        ]);

        return $data;
    }

    public function balanceSet($customer_id, $merchant_id, $value, $address_id = 0, $balance_id = 1)
    {
        $api = $this->api;

        $data = $this->api->call('service/customer.balanceSet', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'merchant_id' => $merchant_id,
            'address_id'  => $address_id,
            'balance_id'  => $balance_id,
            'value'       => $value,
        ]);

        return $data;
    }

    public function rateGet($customer_id, $merchant_id, $address_id = 0)
    {
        $api = $this->api;

        $data = $this->api->call('service/customer.rateGet', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'merchant_id' => $merchant_id,
            'address_id'  => $address_id,
        ]);

        return $data;
    }

    public function rateSet($customer_id, $merchant_id, $value, $address_id = 0, $rate_id = 1)
    {
        $api = $this->api;

        $data = $this->api->call('service/customer.rateSet', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'merchant_id' => $merchant_id,
            'address_id'  => $address_id,
            'rate_id'     => $rate_id,
            'value'       => $value,
        ]);

        return $data;
    }

    public function statsGet($customer_id, $merchant_id, $address_id = 0)
    {
        $api = $this->api;

        $data = $this->api->call('service/customer.statsGet', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'merchant_id' => $merchant_id,
            'address_id'  => $address_id,
        ]);

        return $data;
    }

    public function statsSet($customer_id, $merchant_id, $count, $sum, $discount = 0, $address_id = 0)
    {
        $api = $this->api;

        $data = $this->api->call('service/customer.statsSet', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'merchant_id' => $merchant_id,
            'address_id'  => $address_id,
            'count'       => $count,
            'sum'         => $sum,
            'discount'    => $discount,
        ]);

        return $data;
    }

    public function statsChange($customer_id, $merchant_id, $count, $sum, $discount = 0, $address_id = 0)
    {
        $api = $this->api;

        $data = $this->api->call('service/customer.statsChange', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'merchant_id' => $merchant_id,
            'address_id'  => $address_id,
            'count'       => $count,
            'sum'         => $sum,
            'discount'    => $discount,
        ]);

        return $data;
    }

    public function offerConnect($customer_id, $offer_id, $address_id, $info = 0)
    {
        $api = $this->api;

        $data = $this->api->call('service/customer.offerConnect', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'offer_id'    => $offer_id,
            'address_id'  => $address_id,
            'info'        => $info,
        ]);

        return $data;
    }

    public function infoShare($customer_id, $merchant_id)
    {
        $api = $this->api;

        $data = $this->api->call('service/customer.infoShare', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'merchant_id' => $merchant_id,
        ]);

        return $data;
    }
}