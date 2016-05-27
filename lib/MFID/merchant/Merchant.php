<?php

namespace MFID\merchant;

/**
 * Class Merchant
 * @package MFID\merchant
 *
 * @property ApiMerchant $api
 */
class Merchant
{
    protected $api;

    public function __construct($parent)
    {
        $this->api = $parent;
    }

    public function info()
    {
        $api = $this->api;

        $data = $this->api->call('merchant/merchant.info', [
            'token' => $api->token,
        ]);

        return $data;
    }

    public function addressList($limit = null, $offset = null)
    {
        $api = $this->api;

        $data = $this->api->call('merchant/merchant.addressList', [
            'token'  => $api->token,
            'limit'  => $limit,
            'offset' => $offset
        ]);

        return $data;
    }

    public function offerList($limit = null, $offset = null)
    {
        $api = $this->api;

        $data = $this->api->call('merchant/merchant.offerList', [
            'token' => $api->token,
            'limit'  => $limit,
            'offset' => $offset
        ]);

        return $data;
    }
}