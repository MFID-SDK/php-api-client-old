<?php

use MFID\Api;

require_once '../../lib/MFID/autoload.php';

$api = Api::getInstance(require '../config/merchant.php');

# get customer by phone
$customer1 = $api->customer->getByPhone(79219497971);

Api::r(['get customer by phone' => $customer1 ?: $api->error]);

# get customer by id
$customer2 = $api->customer->getByCustomerId(2);

Api::r(['get customer by id' => $customer2 ?: $api->error]);

$phone = 79023456789;
$pan   = '6085180466043945';

$new_customer = $api->customer->add($phone, $pan, 3, 22, 'test user', 'test@example.com', '1980-04-01', 1);

Api::r(['new customer' => $new_customer ?: $api->error]);

$customer_id = $new_customer['customer_id'];

#balance

$r = $api->customer->balanceSetByCustomerId($customer_id, mt_rand(100, 1000), 22, 2);

Api::r(['balanceSetByCustomerId' => $r ?: $api->error]);

$r = $api->customer->balanceGetByCustomerId($customer_id, 22, 2);

Api::r(['balanceGetByCustomerId' => $r ?: $api->error]);

$r = $api->customer->balanceSetByPhone($phone, mt_rand(100, 1000), 1, 1);

Api::r(['balanceSetByPhone' => $r ?: $api->error]);

$r = $api->customer->balanceGetByPhone($phone, 1, 1);

Api::r(['balanceGetByPhone' => $r ?: $api->error]);

$r = $api->customer->multiBalanceGetByCustomerId($customer_id, 22);

Api::r(['multiBalanceGetByCustomerId' => $r ?: $api->error]);

$r = $api->customer->multiBalanceGetByPhone($phone, 1);

Api::r(['multiBalanceGetByPhone' => $r ?: $api->error]);

$r = $api->customer->rateSetByCustomerId($customer_id, mt_rand(10, 100), 22, 2);

Api::r(['rateSetByCustomerId' => $r ?: $api->error]);

$r = $api->customer->rateGetByCustomerId($customer_id, 22, 2);

Api::r(['rateGetByCustomerId' => $r ?: $api->error]);

$r = $api->customer->rateSetByPhone($phone, mt_rand(10, 100), 1, 1);

Api::r(['rateSetByPhone' => $r ?: $api->error]);

$r = $api->customer->rateGetByPhone($phone, 1, 1);

Api::r(['rateGetByPhone' => $r ?: $api->error]);

$r = $api->customer->multiRateGetByCustomerId($customer_id, 22);

Api::r(['multirateGetByCustomerId' => $r ?: $api->error]);

$r = $api->customer->multiRateGetByPhone($phone, 1);

Api::r(['multirateGetByPhone' => $r ?: $api->error]);

$r = $api->customer->statsGetByCustomerId($customer_id, 22);

Api::r(['statsGetByCustomerId' => $r ?: $api->error]);

$r = $api->customer->statsGetByPhone($phone, 1);

Api::r(['statsGetByPhone' => $r ?: $api->error]);

$r = $api->customer->multiStatsGetByCustomerId($customer_id, 22);

Api::r(['multiStatsGetByCustomerId' => $r ?: $api->error]);

$r = $api->customer->multiStatsGetByPhone($phone, 1);

Api::r(['multiStatsGetByPhone' => $r ?: $api->error]);




