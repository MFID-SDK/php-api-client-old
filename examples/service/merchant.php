<?php

use MFID\Api;

require_once '../../lib/MFID/autoload.php';

$api = Api::getInstance(require '../config/service.php');

# add new merchant
$new = $api->merchant->add('MWB entertainment');

Api::r(['new merchant'=> $new]);

$merchant_id = $new['merchant_id'];

# merchant get
$response = $api->merchant->get($merchant_id);

Api::r(['get merchant info' => $response ?: $api->error]);

# edit new merchant
$response = $api->merchant->update($merchant_id, null, 'desc, piy piy, tro-lo-lo');

Api::r(['update merchant' => $new]);

# merchant get
$response = $api->merchant->get($merchant_id);

Api::r(['get merchant info' => $response ?: $api->error]);

# add new offers
$offer1 = $api->offer->add($merchant_id, 'offer 5% discount', 'desc offer 1', 5, 0, 0);
$offer2 = $api->offer->add($merchant_id, 'offer 10% discount', 'desc offer 1', 10, 1000, 1);
$offer3 = $api->offer->add($merchant_id, 'offer 20% discount', 'desc offer 1', 20, 10000, 2);

# add offer to merchant
$response = $api->merchant->offerAdd($merchant_id, 0 ,$offer1['offer_id'], 0);
Api::r(['add offer to merchant' => $response]);
$response = $api->merchant->offerAdd($merchant_id, 0 ,$offer2['offer_id'], 1);
$response = $api->merchant->offerAdd($merchant_id, 0 ,$offer3['offer_id'], 4);

# merchant offer list
$list = $api->merchant->offerList($merchant_id);

Api::r(['merchant offer list' => $list]);

# del merchant offer
$response = $api->merchant->offerDelete($merchant_id, 0 ,$offer1['offer_id']);
Api::r(['del merchant offer' => $response]);
$response = $api->merchant->offerDelete($merchant_id, 0 ,$offer2['offer_id']);
$response = $api->merchant->offerDelete($merchant_id, 0 ,$offer3['offer_id']);

# merchant list
$list = $api->merchant->list_();

Api::r(['merchant list' => $list]);

# merchant delete
$response = $api->merchant->delete($merchant_id);

Api::r(['delete merchant' => $response ?: $api->error]);

# merchant get
$response = $api->merchant->get($merchant_id);

Api::r(['get merchant info' => $response ?: $api->error]);




