<?php

$conf = [
    'app'    => 'service',
    'group'  => 'customer',
    'methods' => [
        ['name'=> 'keyAdd',         'params'=> ['customer_id', 'key_name', 'key_value', 'key_visual', 'status']],
        ['name'=> 'keyDelete',      'params'=> ['customer_id', 'key_name', 'key_value']],
        ['name'=> 'keyConfirm',     'params'=> ['customer_id', 'key_name', 'key_value', 'status']],
        ['name'=> 'keyList',        'params'=> ['customer_id', 'key_name']],
    ],
];

echo "<pre>\n";
echo "&lt;?php\n";
echo "\n";
echo "namespace MFID\\"."{$conf['app']};\n";
echo "\n";
echo "/**\n";
echo " * Class ".ucfirst($conf['group'])."\n";
echo " * @package MFID\\"."{$conf['app']}\n";
echo " *\n";
echo " * @property ApiService \$api\n";
echo " */\n";
echo "class ".ucfirst($conf['group'])."\n";
echo "{\n";
echo "    protected \$api;\n";
echo "\n";
echo "    public function __construct(\$parent)\n";
echo "    {\n";
echo "        \$this->api = \$parent;\n";
echo "    }\n";

foreach ($conf['methods'] as $method) {
    $len = 0;
    foreach ($method['params'] as $param)
        if (strlen($param) > $len) $len = strlen($param);
    $len += 2;
    echo "\n";
    echo "    public function ".($method['name'] == 'list' ? 'list_' : $method['name'])."($" . implode(', $', $method['params']) . ")\n";
    echo "    {\n";
    echo "        \$api = \$this->api;\n\n";
    echo "        \$data = \$this->api->call('{$conf['app']}/{$conf['group']}.{$method['name']}', [\n";

    echo "            " . str_pad("'token'", $len) . " => \$api->token,\n";
    foreach ($method['params'] as $param)
        echo "            " . str_pad("'$param'", $len) . " => \${$param},\n";

    echo "        ]);\n\n";
    echo "        return \$data;\n";
    echo "    }\n";
}

echo "}\n";
echo "</pre>";
