<?php

require_once '../lib/MFID/autoload.php';

\MFID\Api::eventCatcher(function ($event) {
    // do something with $event
});