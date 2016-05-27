<?php

namespace MFID\merchant;

/**
 * Class Customer
 * @package MFID\merchant
 *
 * @property ApiMerchant $api
 */
class Customer
{
    protected $api;

    public function __construct($parent)
    {
        $this->api = $parent;
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

        $data = $this->api->call('merchant/customer.get', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'phone'       => $phone,
            'key_name'    => $key_name,
            'key_value'   => $key_value,
        ]);

        return $data;
    }

    public function add($phone, $card, $offer_id, $address_id = null, $name = null, $email = null, $birthday = null, $status = null)
    {
        $api = $this->api;

        $data = $this->api->call('merchant/customer.add', [
            'token'       => $api->token,
            'phone'       => $phone,
            'card'        => $card,
            'address_id'  => $address_id,
            'offer_id'    => $offer_id,
            'name'        => $name,
            'email'       => $email,
            'birthday'    => $birthday,
            'status'      => $status,
        ]);

        return $data;
    }

    public function balanceGetByCustomerId($customer_id, $address_id = 0, $balance_id = 1)
    {
        return $this->balanceGet($address_id, $balance_id, $customer_id);
    }

    public function balanceGetByPhone($phone, $address_id = 0, $balance_id = 1)
    {
        return $this->balanceGet($address_id, $balance_id, null, $phone);
    }

    public function balanceGetByAdditionalKey($key_name, $key_value, $address_id = 0, $balance_id = 1)
    {
        return $this->balanceGet($address_id, $balance_id, null, null, $key_name, $key_value);
    }

    public function balanceGet($address_id = 0, $balance_id = 1, $customer_id = null, $phone = null, $key_name = null, $key_value = null)
    {
        $api = $this->api;

        $data = $this->api->call('merchant/customer.balanceGet', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'phone'       => $phone,
            'key_name'    => $key_name,
            'key_value'   => $key_value,
            'address_id'  => $address_id,
            'balance_id'  => $balance_id,
        ]);

        return $data;
    }

    public function balanceSetByCustomerId($customer_id, $value, $address_id = 0, $balance_id = 1)
    {
        return $this->balanceSet($address_id, $balance_id, $value, $customer_id);
    }

    public function balanceSetByPhone($phone, $value, $address_id = 0, $balance_id = 1)
    {
        return $this->balanceSet($address_id, $balance_id, $value, null, $phone);
    }

    public function balanceSetByAdditionalKey($key_name, $key_value, $value, $address_id = 0, $balance_id = 1)
    {
        return $this->balanceSet($address_id, $balance_id, $value, null, null, $key_name, $key_value);
    }

    public function balanceSet($address_id = 0, $balance_id = 1, $value, $customer_id = null, $phone = null, $key_name = null, $key_value = null)
    {
        $api = $this->api;

        $data = $this->api->call('merchant/customer.balanceSet', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'phone'       => $phone,
            'key_name'    => $key_name,
            'key_value'   => $key_value,
            'address_id'  => $address_id,
            'balance_id'  => $balance_id,
            'value'       => $value,
        ]);

        return $data;
    }

    public function rateGetByCustomerId($customer_id, $address_id = 0, $rate_id = 1)
    {
        return $this->rateGet($address_id, $rate_id, $customer_id);
    }

    public function rateGetByPhone($phone, $address_id = 0, $rate_id = 1)
    {
        return $this->rateGet($address_id, $rate_id, null, $phone);
    }

    public function rateGetByAdditionalKey($key_name, $key_value, $address_id = 0, $rate_id = 1)
    {
        return $this->rateGet($address_id, $rate_id, null, null, $key_name, $key_value);
    }

    public function rateGet($address_id = 0, $rate_id = 1, $customer_id = null, $phone = null, $key_name = null, $key_value = null)
    {
        $api = $this->api;

        $data = $this->api->call('merchant/customer.rateGet', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'phone'       => $phone,
            'key_name'    => $key_name,
            'key_value'   => $key_value,
            'address_id'  => $address_id,
            'rate_id'  => $rate_id,
        ]);

        return $data;
    }

    public function rateSetByCustomerId($customer_id, $value, $address_id = 0, $rate_id = 1)
    {
        return $this->rateSet($address_id, $rate_id, $value, $customer_id);
    }

    public function rateSetByPhone($phone, $value, $address_id = 0, $rate_id = 1)
    {
        return $this->rateSet($address_id, $rate_id, $value, null, $phone);
    }

    public function rateSetByAdditionalKey($key_name, $key_value, $value, $address_id = 0, $rate_id = 1)
    {
        return $this->rateSet($address_id, $rate_id, $value, null, null, $key_name, $key_value);
    }

    public function rateSet($address_id = 0, $rate_id = 1, $value, $customer_id = null, $phone = null, $key_name = null, $key_value = null)
    {
        $api = $this->api;

        $data = $this->api->call('merchant/customer.rateSet', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'phone'       => $phone,
            'key_name'    => $key_name,
            'key_value'   => $key_value,
            'address_id'  => $address_id,
            'rate_id'  => $rate_id,
            'value'       => $value,
        ]);

        return $data;
    }

    public function statsGetByCustomerId($customer_id, $address_id = 0)
    {
        return $this->statsGet($address_id, $customer_id);
    }

    public function statsGetByPhone($phone, $address_id = 0)
    {
        return $this->statsGet($address_id, null, $phone);
    }

    public function statsGetByAdditionalKey($key_name, $key_value, $address_id = 0)
    {
        return $this->statsGet($address_id, null, null, $key_name, $key_value);
    }

    public function statsGet($address_id = 0, $customer_id = null, $phone = null, $key_name = null, $key_value = null)
    {
        $api = $this->api;

        $data = $this->api->call('merchant/customer.statsGet', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'phone'       => $phone,
            'key_name'    => $key_name,
            'key_value'   => $key_value,
            'address_id'  => $address_id,
        ]);

        return $data;
    }

    public function multiBalanceGetByCustomerId($customer_id, $address_id = 0)
    {
        return $this->multiBalanceGet($address_id, $customer_id);
    }

    public function multiBalanceGetByPhone($phone, $address_id = 0)
    {
        return $this->multiBalanceGet($address_id, null, $phone);
    }

    public function multiBalanceGetByAdditionalKey($key_name, $key_value, $address_id = 0)
    {
        return $this->multiBalanceGet($address_id, null, null, $key_name, $key_value);
    }

    public function multiBalanceGet($address_id = 0, $customer_id = null, $phone = null, $key_name = null, $key_value = null)
    {
        $api = $this->api;

        $data = $this->api->call('merchant/customer.multiBalanceGet', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'phone'       => $phone,
            'key_name'    => $key_name,
            'key_value'   => $key_value,
            'address_id'  => $address_id,
        ]);

        return $data;
    }

    public function multiRateGetByCustomerId($customer_id, $address_id = 0)
    {
        return $this->multiRateGet($address_id, $customer_id);
    }

    public function multiRateGetByPhone($phone, $address_id = 0)
    {
        return $this->multiRateGet($address_id, null, $phone);
    }

    public function multiRateGetByAdditionalKey($key_name, $key_value, $address_id = 0)
    {
        return $this->multiRateGet($address_id, null, null, $key_name, $key_value);
    }

    public function multiRateGet($address_id = 0, $customer_id = null, $phone = null, $key_name = null, $key_value = null)
    {
        $api = $this->api;

        $data = $this->api->call('merchant/customer.multiRateGet', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'phone'       => $phone,
            'key_name'    => $key_name,
            'key_value'   => $key_value,
            'address_id'  => $address_id,
        ]);

        return $data;
    }

    public function multiStatsGetByCustomerId($customer_id, $address_id = 0)
    {
        return $this->multiStatsGet($address_id, $customer_id);
    }

    public function multiStatsGetByPhone($phone, $address_id = 0)
    {
        return $this->multiStatsGet($address_id, null, $phone);
    }

    public function multiStatsGetByAdditionalKey($key_name, $key_value, $address_id = 0)
    {
        return $this->multiStatsGet($address_id, null, null, $key_name, $key_value);
    }

    public function multiStatsGet($address_id = 0, $customer_id = null, $phone = null, $key_name = null, $key_value = null)
    {
        $api = $this->api;

        $data = $this->api->call('merchant/customer.multiStatsGet', [
            'token'       => $api->token,
            'customer_id' => $customer_id,
            'phone'       => $phone,
            'key_name'    => $key_name,
            'key_value'   => $key_value,
            'address_id'  => $address_id,
        ]);

        return $data;
    }
}