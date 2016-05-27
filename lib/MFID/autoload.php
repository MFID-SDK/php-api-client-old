<?php
namespace MFID;

// The MFID SDK autoloader.  You probably shouldn't be using this.  Instead,
// use a global autoloader, like the Composer autoloader.
//
// But if you really don't want to use a global autoloader, do this:
//
//     require_once "<path-to-here>/MFID/autoload.php"

/**
 * @internal
 */
function autoload($name)
{
    // If the name doesn't start with "MFID\", then its not once of our classes.
    if (\substr_compare($name, "MFID\\", 0, 5) !== 0) return;
    $name = \str_replace(["\\"], '/', \substr($name, 5));
    $path = __DIR__ . "/{$name}.php";
    if (\is_file($path)) require_once $path;
}

\spl_autoload_register('MFID\autoload');
