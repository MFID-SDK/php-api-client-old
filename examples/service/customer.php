<?php

use MFID\Api;

require_once '../../lib/MFID/autoload.php';

$api = Api::getInstance(require '../config/service.php');



$new = $api->merchant->add('MWB entertainment');
$merchant_id = $new['merchant_id'];
$new = $api->offer->add($merchant_id, 'offer test');
$offer_id = $new['offer_id'];
$api->merchant->offerAdd($merchant_id, 0 ,$offer_id, 0);


# add new customer
$phone = 79123456778;
$new = $api->customer->add($phone, 4);

Api::r(['new customer'=> $new]);

$customer_id = $new['customer_id'];

# get customer by phone
$response = $api->customer->getByPhone($phone);

Api::r(['get customer by phone' => $response ?: $api->error]);

# edit new customer
$response = $api->customer->update($customer_id, null, 'email@example.com', 'name', '1986-04-26');

Api::r(['edit new customer' => $new]);

# get customer by id
$response = $api->customer->get($customer_id);

Api::r(['get customer by id' => $response ?: $api->error]);

# add additional key
$response = $api->customer->keyAdd($customer_id, 'bank_hash', 'ffeeddccbbaa99887766554433221100ffffffff', '987654**3210');

Api::r(['add additional key' => $response ?: $api->error]);

# confirm additional key
$response = $api->customer->keyConfirm($customer_id, 'bank_hash', 'ffeeddccbbaa99887766554433221100ffffffff');

Api::r(['confirm additional key' => $response ?: $api->error]);

# key list
$response = $api->customer->keyList($customer_id);

Api::r(['key list' => $response ?: $api->error]);

# get customer by additional key
$response = $api->customer->getByAdditionalKey('bank_hash', 'ffeeddccbbaa99887766554433221100ffffffff');

Api::r(['get customer by additional key' => $response ?: $api->error]);

# delete additional key
$response = $api->customer->keyDelete($customer_id, 'bank_hash', 'ffeeddccbbaa99887766554433221100ffffffff');

Api::r(['delete additional key' => $response ?: $api->error]);

# offer connect
$response = $api->customer->offerConnect($customer_id, $offer_id, 0, 0);

Api::r(['offer connect' => $response ?: $api->error]);

# share info
$response = $api->customer->infoShare($customer_id, $merchant_id);

Api::r(['share info' => $response ?: $api->error]);

# balance set
$response = $api->customer->balanceSet($customer_id, $merchant_id, 1000);

Api::r(['balance set' => $response ?: $api->error]);

# balance get
$response = $api->customer->balanceGet($customer_id, $merchant_id);

Api::r(['balance get' => $response ?: $api->error]);

# rate set
$response = $api->customer->rateSet($customer_id, $merchant_id, 20);

Api::r(['rate set' => $response ?: $api->error]);

# rate get
$response = $api->customer->rateGet($customer_id, $merchant_id);

Api::r(['rate get' => $response ?: $api->error]);

# stats set
$response = $api->customer->statsSet($customer_id, $merchant_id, 2, 1500, 500);

Api::r(['stats set' => $response ?: $api->error]);

# stats get
$response = $api->customer->statsGet($customer_id, $merchant_id);

Api::r(['stats get' => $response ?: $api->error]);

# stats change
$response = $api->customer->statsSet($customer_id, $merchant_id, 10, 10000, 1000);

Api::r(['stats change' => $response ?: $api->error]);

# stats get
$response = $api->customer->statsGet($customer_id, $merchant_id);

Api::r(['stats get' => $response ?: $api->error]);

# stats set
$response = $api->customer->statsSet($customer_id, $merchant_id, 2, 1500, 500);

Api::r(['stats set' => $response ?: $api->error]);

# stats get
$response = $api->customer->statsGet($customer_id, $merchant_id);

Api::r(['stats get' => $response ?: $api->error]);

# customer delete
$response = $api->customer->delete($customer_id, 'delete test customer');

Api::r(['delete customer' => $response ?: $api->error]);

# customer get
$response = $api->customer->get($customer_id);

Api::r(['get customer info' => $response ?: $api->error]);

$api->merchant->offerDelete($merchant_id, 0 ,$offer_id);
$api->offer->delete($offer_id);
$api->merchant->delete($merchant_id);

# customer card list
$response = $api->customer->cardList(450);

Api::r(['customer card list' => $response ?: $api->error]);

# customer market list
$response = $api->customer->marketList(450);

Api::r(['customer market list' => $response ?: $api->error]);

# customer merchant list
$response = $api->customer->merchantList(450);

Api::r(['customer merchant list' => $response ?: $api->error]);

# customer list by merchant id
$response = $api->customer->listByMerchantId(4);

Api::r(['customer list by merchant id' => $response ?: $api->error]);

# customer list by address id
$response = $api->customer->listByAddressId(1);

Api::r(['customer list by address id' => $response ?: $api->error]);
