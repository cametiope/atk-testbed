<?php

include_once __DIR__ . '/../vendor/autoload.php';


$atkBootstrap = new Sintattica\Atk\Core\Atk(getenv('APP_ENV'), __DIR__ . '/../');
$atkBootstrap->run();
