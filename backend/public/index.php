<?php

error_reporting(E_ALL);

define('APP_PATH', realpath('..'));

$start = microtime(true);

try {

    /**
     * Read the configuration
     */
    $config = include APP_PATH . "/app/config/config.php";

    /**
     * Read auto-loader
     */
    include APP_PATH . "/app/config/loader.php";

    /**
     * Read services
     */
    include APP_PATH . "/app/config/services.php";

    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application($di);

    echo $application->handle()->getContent();

} catch (\Exception $e) {
    echo $e->getMessage();
}

echo '<div class="text-right" style="font-size: 7pt;">' . (1000 * round((microtime(true) - $start), 4)) . 'ms - ' . convert(memory_get_usage()) . '</div>';

function convert($size) {
	$unit = array('b', 'kb', 'mb', 'gb', 'tb', 'pb');
	return @round($size / pow(1024, ($i = floor( log( $size, 1024 ) ) ) ),2) . ' ' . $unit[$i];
}