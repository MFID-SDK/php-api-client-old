<?php

use MFID\Api;

require_once '../../lib/MFID/autoload.php';

$api = Api::getInstance(require '../config/service.php');

# add new merchant
$new = $api->merchant->add('MWB entertainment', 'winter is coming');
$merchant_id = $new['merchant_id'];
# add new offers
$offer1 = $api->offer->add($merchant_id, 'offer 5% discount', 'desc offer 1', 5, 0, 0);
$offer2 = $api->offer->add($merchant_id, 'offer 10% discount', 'desc offer 1', 10, 1000, 1);
$offer3 = $api->offer->add($merchant_id, 'offer 20% discount', 'desc offer 1', 20, 10000, 2);
# add offer to merchant
$response = $api->merchant->offerAdd($merchant_id, 0 ,$offer1['offer_id'], 0);
$response = $api->merchant->offerAdd($merchant_id, 0 ,$offer2['offer_id'], 1);
$response = $api->merchant->offerAdd($merchant_id, 0 ,$offer3['offer_id'], 4);

# add new market
$response = $api->market->add($merchant_id, $merchant_id, 0);

Api::r(['add new market' => $response]);

# get new market
$response = $api->market->get($merchant_id, $merchant_id);

Api::r(['get new market' => $response]);

# edit new market
$response = $api->market->update($merchant_id, $merchant_id, 7);

Api::r(['edit new market' => $response]);

# get new market
$response = $api->market->get($merchant_id, $merchant_id);

Api::r(['get new market' => $response]);

# delete new market
$response = $api->market->delete($merchant_id, $merchant_id);

Api::r(['delete new market' => $response]);

# get new market
$response = $api->market->get($merchant_id, $merchant_id);

Api::r(['get new market' => $response ?: $api->error]);

# market list
$response = $api->market->list_();

Api::r(['market list' => $response]);

# market list by market_id
$response = $api->market->listByMarketId(4);

Api::r(['market list by market_id' => $response]);

# market list by merchant_id
$response = $api->market->listByMerchantId(4);

Api::r(['market list by merchant_id' => $response]);

# delete merchant offers
$api->merchant->offerDelete($merchant_id, 0 ,$offer1['offer_id']);
$api->merchant->offerDelete($merchant_id, 0 ,$offer2['offer_id']);
$api->merchant->offerDelete($merchant_id, 0 ,$offer3['offer_id']);
# delete offers
$api->offer->delete($offer1['offer_id']);
$api->offer->delete($offer2['offer_id']);
$api->offer->delete($offer3['offer_id']);
# delete merchant
$new = $api->merchant->delete($merchant_id);
