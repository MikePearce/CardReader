<?php

/**
 * Run this file and pass in the name of the csv as the only argument.
 *
 * @package CardReader
 * @author  Mike Pearce <mike@mikepearce.net>
 * @since   20/09/10
 **/

// Set the include path to here.
set_include_path(get_include_path . PATH_SEPERATOR . __DIR__);
date_default_timezone_set('GMT');
 
/**
 * Autoloader
 * @param string Classname
 */
function __autoload($class) {

    // convert namespace to full file path
    $class = str_replace('\\', '/', $class).'.php';
    if (file_exists($class))
    {
        require_once($class);
    }
    else {
        throw new Exception($class .' does not exist.');
    }
}

// Check we have arguments
if (!isset($argv[1]) OR !isset($argv[2]))
{
    throw new Exception(
        "Arguments Missing! \n\nUSAGE: php run.php ".
        "[csv|db|other] [filename|connectonDetails|other] "
    );
}

// Got this far - great, let's kick it off.
$runner = new Models\Core\Runner();
$runner->setDataSrc($argv[1]);
$runner->setData($argv[2]);
$runner->run();