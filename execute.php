<?php
//Sets up the full PHP environment, loads in dependancies and functions.
define('BASE_PATH',dirname($_SERVER['DOCUMENT_ROOT']).'/');
session_start();
date_default_timezone_set('Europe/London');

error_reporting(E_ERROR | E_PARSE);

require BASE_PATH.'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use Medoo\Medoo;
$database = new Medoo([
    'database_type' => $_ENV['DB_TYPE'],
    'database_name' => $_ENV['DB_DATABASE'],
    'server' => $_ENV['DB_SERVER'],
    'username' => $_ENV['DB_USERNAME'],
    'password' => $_ENV['DB_PASSWORD'],
]);

use Roublez\LogSnag\Client;
$logsnag = new Client($_ENV['LS_API'], 'shopping-list');

date_default_timezone_set('Europe/London');
require_once BASE_PATH.'functions.php';
?>
