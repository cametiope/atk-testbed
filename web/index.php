<?php

include_once __DIR__ . '/../vendor/autoload.php';

//$atkBootstrap = new Sintattica\Atk\Core\Bootstrap(getenv('APP_ENV'), __DIR__ . '/../');
//$atkBootstrap->boot();

\Sintattica\Atk\Core\Config::setGlobal('application_config', __DIR__.'/../app/config/atk.php');

$atk = new \Sintattica\Atk\Core\Atk(getenv('APP_ENV'), __DIR__ . '/../');
$atk->run();