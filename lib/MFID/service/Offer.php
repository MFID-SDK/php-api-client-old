<?php

namespace MFID\service;

/**
 * Class Offer
 * @package MFID\service
 *
 * @property ApiService $api
 */
class Offer
{
    protected $api;

    public function __construct($parent)
    {
        $this->api = $parent;
    }

    public function list_($merchant_id = 0, $limit = null, $offset = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/offer.list', [
            'token'       => $api->token,
            'merchant_id' => $merchant_id,
            'limit'       => $limit,
            'offset'      => $offset,
        ]);

        return $data;
    }

    public function get($offer_id)
    {
        $api = $this->api;

        $data = $this->api->call('service/offer.get', [
            'token'    => $api->token,
            'offer_id' => $offer_id,
        ]);

        return $data;
    }

    public function add($merchant_id, $name, $description = '', $percent = 0, $price = 0, $weight = 0)
    {
        $api = $this->api;

        $data = $this->api->call('service/offer.add', [
            'token'       => $api->token,
            'merchant_id' => $merchant_id,
            'name'        => $name,
            'description' => $description,
            'percent'     => $percent,
            'price'       => $price,
            'weight'      => $weight,
        ]);

        return $data;
    }

    public function update($offer_id, $name, $description = '', $percent = 0, $price = 0, $weight = 0)
    {
        $api = $this->api;

        $data = $this->api->call('service/offer.update', [
            'token'       => $api->token,
            'offer_id'    => $offer_id,
            'name'        => $name,
            'description' => $description,
            'percent'     => $percent,
            'price'       => $price,
            'weight'      => $weight,
        ]);

        return $data;
    }

    public function delete($offer_id)
    {
        $api = $this->api;

        $data = $this->api->call('service/offer.delete', [
            'token'    => $api->token,
            'offer_id' => $offer_id,
        ]);

        return $data;
    }
}