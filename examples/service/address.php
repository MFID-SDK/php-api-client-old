<?php

use MFID\Api;

require_once '../../lib/MFID/autoload.php';

$api = Api::getInstance(require '../config/service.php');

# add new address
$new = $api->address->add(4, 666, 'address test');

Api::r(['new address'=> $new]);

$address_id = $new['address_id'];

# address get
$response = $api->address->getByAddressId($address_id);

Api::r(['get address info by address id' => $response ?: $api->error]);

# edit new address
$response = $api->address->update($address_id, null, null, 'desc, piy piy, tro-lo-lo');

Api::r(['update address' => $new]);

# address get
$response = $api->address->getByYandexId(666);

Api::r(['get address info by yandex id' => $response ?: $api->error]);

# address delete
$response = $api->address->delete($address_id);

Api::r(['delete address' => $response ?: $api->error]);

# address get
$response = $api->address->get($address_id);

Api::r(['get address info' => $response ?: $api->error]);