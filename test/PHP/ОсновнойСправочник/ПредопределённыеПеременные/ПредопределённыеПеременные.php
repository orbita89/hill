<?php


$global = $GLOBALS;
$server = $_SERVER;


function get_contents() {
    file_get_contents("http://example.com");
    var_dump($http_response_header);
}

get_contents();

$A = '';


echo "Количество аргументов: " . $argc . "\n";
print_r($argv);