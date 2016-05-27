<?php

use MFID\Api;

require_once '../../lib/MFID/autoload.php';

$api = Api::getInstance(require '../config/service.php');

# add new offer
$new = $api->offer->add(4, 'offer test');

Api::r(['new offer'=> $new]);

$offer_id = $new['offer_id'];

# offer get
$response = $api->offer->get($offer_id);

Api::r(['get offer info' => $response ?: $api->error]);

# edit new offer
$response = $api->offer->update($offer_id, null, 'desc, piy piy, tro-lo-lo', 50, 10000, 4);

Api::r(['update offer' => $new]);

# offer get
$response = $api->offer->get($offer_id);

Api::r(['get offer info' => $response ?: $api->error]);

# offer delete
$response = $api->offer->delete($offer_id);

Api::r(['delete offer' => $response ?: $api->error]);

# offer get
$response = $api->offer->get($offer_id);

Api::r(['get offer info' => $response ?: $api->error]);