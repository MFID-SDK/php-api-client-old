<?php

$m = new Memcache();
$m->connect('localhost', 11211);
$m->flush();

echo date('Y-m-d H:i:s', 1463576351);
