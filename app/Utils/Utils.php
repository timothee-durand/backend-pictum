<?php
namespace App\Utils;



function echoPerso (){
    $args = func_get_args();

    foreach ($args as $arg) {
        echo getVarName($arg)." : ".json_encode($arg)."\n";
    }
}

function getVarName($var) {
    return $$var;
}

