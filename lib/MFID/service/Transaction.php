<?php

namespace MFID\service;

/**
 * Class Transaction
 * @package MFID\service
 *
 * @property ApiService $api
 */
class Transaction
{
    protected $api;

    public function __construct($parent)
    {
        $this->api = $parent;
    }

    public function get($transaction_id, $merchant_id, $address_id, $external_id)
    {
        $api = $this->api;

        $data = $this->api->call('service/transaction.get', [
            'token'          => $api->token,
            'transaction_id' => $transaction_id,
            'merchant_id'    => $merchant_id,
            'address_id'     => $address_id,
            'external_id'    => $external_id,
        ]);

        return $data;
    }

    public function add($merchant_id, $address_id, $external_id, $pay_id, $amount, $discount = 0, $time_open = 0, $time_precheck = 0, $time_close = 0, $items = [])
    {
        $api = $this->api;

        $data = $this->api->call('service/transaction.add', [
            'token'         => $api->token,
            'merchant_id'   => $merchant_id,
            'address_id'    => $address_id,
            'external_id'   => $external_id,
            'pay_id'        => $pay_id,
            'amount'        => $amount,
            'discount'      => $discount,
            'time_open'     => $time_open,
            'time_precheck' => $time_precheck,
            'time_close'    => $time_close,
            'items'         => json_encode($items),
        ]);

        return $data;
    }

    public function precheck($merchant_id, $address_id, $external_id, $pay_id, $amount, $discount = 0, $time = 0, $operator = '', $terminal = '')
    {
        $api = $this->api;

        $data = $this->api->call('service/transaction.precheck', [
            'token'         => $api->token,
            'merchant_id'   => $merchant_id,
            'address_id'    => $address_id,
            'external_id'   => $external_id,
            'pay_id'        => $pay_id,
            'amount'        => $amount,
            'discount'      => $discount,
            'time'          => $time,
            'operator'      => $operator,
            'terminal'      => $terminal,
        ]);

        return $data;
    }

    public function precheckGet($precheck_id, $merchant_id, $address_id, $external_id)
    {
        $api = $this->api;

        $data = $this->api->call('service/transaction.precheckGet', [
            'token'         => $api->token,
            'precheck_id'   => $precheck_id,
            'merchant_id'   => $merchant_id,
            'address_id'    => $address_id,
            'external_id'   => $external_id,
        ]);

        return $data;
    }
}