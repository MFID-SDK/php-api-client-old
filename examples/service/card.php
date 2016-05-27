<?php

use MFID\Api;

require_once '../../lib/MFID/autoload.php';

$api = Api::getInstance(require '../config/service.php');


$new = $api->merchant->add('MWB entertainment');
$merchant_id = $new['merchant_id'];
$phone = 79123456712;
$new = $api->customer->add($phone, $merchant_id);
$customer_id = $new['customer_id'];
$pan = '6085180137645227';

if (!isset($merchant_id)) die ('Oops check merchant');
if (!isset($customer_id)) die ('Oops check customer');




# add new card
$new = $api->card->add($customer_id, $merchant_id, 0, $pan, 0);

Api::r(['new card'=> $new ?: $api->error]);

$card_id = $new['card_id'];

# card get by pan
$response = $api->card->getByPan($pan);

Api::r(['card get by pan' => $response ?: $api->error]);

# edit new card
$response = $api->card->update($card_id, 1);

Api::r(['update card' => $response ?: $api->error]);

# card get by id
$response = $api->card->getByCardId($card_id);

Api::r(['card get by id' => $response ?: $api->error]);

# card delete
$response = $api->card->delete($card_id);

Api::r(['delete card' => $response ?: $api->error]);

# card get
$response = $api->card->get($card_id);

Api::r(['get card info' => $response ?: $api->error]);

# card merchant list
$response = $api->card->merchantList(4);

Api::r(['get card info' => $response ?: $api->error]);

# card list by merchant id
$response = $api->card->listByMerchantId(4);

Api::r(['card list by merchant id' => $response ?: $api->error]);

# card list by address id
$response = $api->card->listByAddressId(1);

Api::r(['card list by address id' => $response ?: $api->error]);

# card list by issuer id
$response = $api->card->listByIssuerId(4);

Api::r(['card list by issuer id' => $response ?: $api->error]);
