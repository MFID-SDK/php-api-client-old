<?php

namespace MFID\merchant;

/**
 * Class Card
 * @package MFID\merchant
 *
 * @property ApiMerchant $api
 */
class Card
{
    protected $api;

    public function __construct($parent)
    {
        $this->api = $parent;
    }

    public function getByCardId ($card_id)
    {
        return $this->get($card_id);
    }

    public function getByPan ($pan)
    {
        return $this->get(null, $pan);
    }

    public function getByAdditionalKey($key_name, $key_value)
    {
        return $this->get(null, null, $key_name, $key_value);
    }

    public function get($card_id = null, $pan = null, $key_name = null, $key_value = null)
    {
        $api = $this->api;

        $data = $this->api->call('merchant/card.get', [
            'token'     => $api->token,
            'card_id'   => $card_id,
            'pan'       => $pan,
            'key_name'  => $key_name,
            'key_value' => $key_value,
        ]);

        return $data;
    }

    public function updates($address_id = null, $action_time = null, $limit = null, $offset = null)
    {
        $api = $this->api;

        $data = $this->api->call('merchant/card.updates', [
            'token'       => $api->token,
            'address_id'  => $address_id,
            'action_time' => $action_time,
            'limit'       => $limit,
            'offset'      => $offset,
        ]);

        return $data;
    }
}