<?php

include_once __DIR__ . '/../vendor/autoload.php';


register_shutdown_function( "fatal_handler" );

function fatal_handler() {
    $errfile = "unknown file";
    $errstr  = "shutdown";
    $errno   = E_CORE_ERROR;
    $errline = 0;

    $error = error_get_last();

    if( $error !== NULL) {
        $errno   = $error["type"];
        $errfile = $error["file"];
        $errline = $error["line"];
        $errstr  = $error["message"];

        var_dump($error);
    }
}



$atk = new Sintattica\Atk\Core\Atk(getenv('APP_ENV'), __DIR__ . '/../');
$atk->run();
