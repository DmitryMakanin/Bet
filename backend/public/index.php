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

echo "<p class=\"text-right\">". 1000 * round(microtime(true) - $start, 4) . " ms</p>";