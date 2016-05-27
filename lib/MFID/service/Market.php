<?php

namespace MFID\service;

/**
 * Class Market
 * @package MFID\service
 *
 * @property ApiService $api
 */
class Market
{
    protected $api;

    public function __construct($parent)
    {
        $this->api = $parent;
    }

    public function listByMarketId($market_id, $limit = null, $offset = null)
    {
        return $this->list_($market_id, null, $limit, $offset);
    }

    public function listByMerchantId($merchant_id, $limit = null, $offset = null)
    {
        return $this->list_(null, $merchant_id, $limit, $offset);
    }

    public function list_($market_id = null, $merchant_id = null, $limit = null, $offset = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/market.list', [
            'token'       => $api->token,
            'market_id'   => $market_id,
            'merchant_id' => $merchant_id,
            'limit'       => $limit,
            'offset'      => $offset,
        ]);

        return $data;
    }

    public function get($market_id, $merchant_id)
    {
        $api = $this->api;

        $data = $this->api->call('service/market.get', [
            'token'       => $api->token,
            'market_id'   => $market_id,
            'merchant_id' => $merchant_id,
        ]);

        return $data;
    }

    public function add($market_id, $merchant_id, $weight = 0)
    {
        $api = $this->api;

        $data = $this->api->call('service/market.add', [
            'token'       => $api->token,
            'market_id'   => $market_id,
            'merchant_id' => $merchant_id,
            'weight'      => $weight,
        ]);

        return $data;
    }

    public function update($market_id, $merchant_id, $weight = 0)
    {
        $api = $this->api;

        $data = $this->api->call('service/market.update', [
            'token'       => $api->token,
            'market_id'   => $market_id,
            'merchant_id' => $merchant_id,
            'weight'      => $weight,
        ]);

        return $data;
    }

    public function delete($market_id, $merchant_id)
    {
        $api = $this->api;

        $data = $this->api->call('service/market.delete', [
            'token'       => $api->token,
            'market_id'   => $market_id,
            'merchant_id' => $merchant_id,
        ]);

        return $data;
    }
}