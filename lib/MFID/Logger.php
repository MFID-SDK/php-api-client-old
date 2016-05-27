<?php

namespace MFID;


class Logger
{
    static private $out      = null;
    static private $base_dir = __DIR__ . '/../../runtime/';
    static private $counter  = 0;
    static private $time     = 0;

    public static function init()
    {
        if (!self::$out) {
            self::$out = fopen(self::$base_dir . self::time('Y-m-d_H-i-s_'), 'w');
        }
        self::$time = microtime(true);
    }

    public static function time($format = 'Y-m-d H:i:s ')
    {
        return date($format) . substr(microtime(true), 11);
    }

    public static function write()
    {
        self::init();

        $caller = self::trace(2);

        self::writeString("[" . self::$counter++ . "] " . self::time() . " (" . self::time_diff(). ")");
        self::writeString("    " . $caller['call'] . " - " . $caller['file'] . " [line: " . $caller['line'] . "]");

        $messages = func_get_args();
        if (count($messages)) {
            foreach ($messages as $message)
                self::writeData($message);
        }

        self::writeString();
    }

    private static function trace($skip = 0)
    {
        $trace = debug_backtrace();

        if ($skip) {
            $trace = array_slice($trace, $skip);
        }

        $trace = array_shift($trace);

        $trace['call'] = $trace['function'];

        if (isset($trace['class'])) {
            $trace['call'] = $trace['class'] . $trace['type'] . $trace['call'];
        }

        return $trace;
    }

    private static function time_diff()
    {
        return sprintf('%f', microtime(true) - self::$time);
    }

    private static function writeData($array = [], $prefix = '    ')
    {
        if (!is_array($array)) return self::writeString($prefix . $array);

        return self::writeString(self::arrayToString($array));
    }

    private static function arrayToString($array = [], $lvl = 1, $prefix = '    ')
    {
        $lvl_prefix = str_repeat($prefix, $lvl);

        $res = $lvl == 1 ? "{$prefix}[\n" : "[\n";
        foreach ($array as $key => $value) {
            $res .= "{$prefix}{$lvl_prefix}{$key} => " . (is_array($value) ? self::arrayToString($value, $lvl + 1, $prefix) : "$value") . "\n";
        }
        return $res . "{$lvl_prefix}]";
    }

    private static function writeString($string = '')
    {
        return fwrite(self::$out, "$string\n");
    }
}