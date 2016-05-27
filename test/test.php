<?php

require_once '../lib/MFID/autoload.php';

if (callback_emulator()) {
    echo "all right<br/>";
} else {
    echo "fail";
}

function callback_emulator()
{
    $data = [
        'event_id' => 6,
        'name'     => 'customer.add',
        'data'     => json_encode([
            'customer_id' => 6,
            'card_id'     => 707
        ])
    ];

    $curl     = new \MFID\Curl();
    $response = $curl->post('http://mfid-sdk.local/callback.php', $data);

    if ($curl->http_status_code != 200)
    {
        return false;
    }

    \MFID\Api::r($response);

    $response = @json_decode($response, true) ?: false;

    if (!$response ||
        !isset($response['success']) ||
        !isset($response['event_id']) ||
        $response['event_id'] != $data['event_id'])
    {
        return false;
    }

    return true;
}