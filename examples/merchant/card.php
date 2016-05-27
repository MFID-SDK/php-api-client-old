<?php

use MFID\Api;

require_once '../../lib/MFID/autoload.php';

$api = Api::getInstance(require '../config/merchant.php');



$r = $api->card->getByCardId(2219);

Api::r(['card-getByCardId' => $r ?: $api->error]);

$r = $api->card->getByPan('9643812063096954');

Api::r(['card-getByPan' => $r ?: $api->error]);

$r = $api->card->getByAdditionalKey('nfc', '047240E2BC3480');

Api::r(['card-getByAdditionalKey' => $r ?: $api->error]);



$r = $api->card->updates();

Api::r(['card-updates' => $r ?: $api->error]);
