<?php
// Общие настройки

if (function_exists('date_default_timezone_set')){
    date_default_timezone_set('Europe/Kiev');    
}

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

ini_set('log_errors', 1);

ini_set('error_log', dirname(__FILE__) . '/../logs/error_log.txt');

error_reporting(E_ALL);

require_once realpath(__DIR__).'/../config/app.php';

function makeConnection(){
        try {
            return new PDO(
                'mysql:host=localhost;dbname='.DATABASE,
                DBUSER,
                DBPASSWORD               
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
}

function render($path, $data = []) 
{
    extract($data);
    return require VIEWS."{$path}.php";
}

require_once CORE.'Router.php';
