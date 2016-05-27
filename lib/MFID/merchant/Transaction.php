<?php

namespace MFID\merchant;

/**
 * Class Transaction
 * @package MFID\merchant
 *
 * @property ApiMerchant $api
 */
class Transaction
{
    protected $api;

    public function __construct($parent)
    {
        $this->api = $parent;
    }

    public function add($address_id, $external_id, $pay_id, $amount, $discount = 0, $time_open = 0, $time_precheck = 0, $time_close = 0, $items = [])
    {
        $api = $this->api;

        $data = $this->api->call('merchant/transaction.add', [
            'token'         => $api->token,
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

    public function precheck($address_id, $external_id, $amount, $discount = 0, $time = 0, $operator = '', $terminal = '')
    {
        $api = $this->api;

        $data = $this->api->call('merchant/transaction.precheck', [
            'token'         => $api->token,
            'address_id'    => $address_id,
            'external_id'   => $external_id,
            'amount'        => $amount,
            'discount'      => $discount,
            'time'          => $time,
            'operator'      => $operator,
            'terminal'      => $terminal,
        ]);

        return $data;
    }
}