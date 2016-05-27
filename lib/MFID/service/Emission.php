<?php

namespace MFID\service;

/**
 * Class Emission
 * @package MFID\service
 *
 * @property ApiService $api
 */
class Emission
{
    protected $api;

    public function __construct($parent)
    {
        $this->api = $parent;
    }

    public function reserve($count, $series_name, $series_description = '')
    {
        $api = $this->api;

        $data = $this->api->call('service/emission.reserve', [
            'token'  => $api->token,
            'series_name' => $series_name,
            'series_description' => $series_description,
            'count' => $count,
        ]);

        return $data;
    }

    public function confirm($series_name, $status = 0)
    {
        $api = $this->api;

        $data = $this->api->call('service/emission.confirm', [
            'token'  => $api->token,
            'series_name' => $series_name,
            'status' => $status,
        ]);

        return $data;
    }

    public function seriesList($app_id = 0, $limit = null, $offset = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/emission.seriesList', [
            'token'  => $api->token,
            'app_id' => $app_id,
            'limit' => $limit,
            'offset' => $offset,
        ]);

        return $data;
    }

    public function seriesInfoBySeriesId($series_id)
    {
        return $this->seriesInfo($series_id);
    }

    public function seriesInfoBySeriesName($series_name)
    {
        return $this->seriesInfo(null, $series_name);
    }

    public function seriesInfo($series_id = null, $series_name = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/emission.seriesInfo', [
            'token'  => $api->token,
            'series_id' => $series_id,
            'series_name' => $series_name,
        ]);

        return $data;
    }

    public function numberListBySeriesId($series_id, $limit = null, $offset = null)
    {
        return $this->numberList($series_id, 0, 0, $limit, $offset);
    }

    public function numberListByAppId($app_id, $limit = null, $offset = null)
    {
        return $this->numberList(0, $app_id, 0, $limit, $offset);
    }

    public function numberListByMerchantId($merchant_id, $limit = null, $offset = null)
    {
        return $this->numberList(0, 0, $merchant_id, $limit, $offset);
    }

    public function numberList($series_id = 0, $app_id = 0, $merchant_id = 0, $limit = null, $offset = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/emission.numberList', [
            'token'  => $api->token,
            'series_id' => $series_id,
            'app_id' => $app_id,
            'merchant_id' => $merchant_id,
            'offset' => $offset,
            'limit' => $limit,
        ]);

        return $data;
    }

    public function numberInfoByPan($pan)
    {
        return $this->numberInfo($pan);
    }

    public function numberInfoByAdditionalKey($key_name, $key_value)
    {
        return $this->numberInfo('', $key_name, $key_value);
    }

    public function numberInfo($pan = null, $key_name = null, $key_value = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/emission.numberInfo', [
            'token'  => $api->token,
            'pan' => $pan,
            'key_name' => $key_name,
            'key_value' => $key_value,
        ]);

        return $data;
    }

    public function matching($data)
    {
        $api = $this->api;

        $data = $this->api->call('service/emission.matching', [
            'token'  => $api->token,
            'data' => $data,
        ]);

        return $data;
    }

    public function matchingStatus($matching_key, $details = null)
    {
        $api = $this->api;

        $data = $this->api->call('service/emission.matchingStatus', [
            'token'  => $api->token,
            'matching_key' => $matching_key,
            'details' => $details,
        ]);

        return $data;
    }
}