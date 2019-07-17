<?php
require './vendor/autoload.php';
$query = $argv[1];

$key = getenv('apikey');

$coda = new \danielstieber\CodAlfred\CodAlfred($key);
echo $coda->find($query);