<?php

namespace App\Utils;


use Illuminate\Support\Facades\URL;

function echoPerso()
{
    $args = func_get_args();

    foreach ($args as $arg) {
        echo getVarName($arg) . " : " . json_encode($arg) . "\n";
    }
}

function getVarName($var)
{
    return $$var;
}

function getFullFilePath($path)
{
    $path = substr($path, strlen('public/'));
    $baseURL = Url::to("/");
    return $baseURL. "/storage/" . $path;
}







