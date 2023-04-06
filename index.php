<?php

use Source\Core\Route;

header("Access-Control-Allow-Origin: *");
header("Content-type: text/html; charset=UTF-8");

require(__DIR__ . "/vendor/autoload.php");

ignore_user_abort(true);
set_time_limit(1280);
ini_set("max_execution_time", 180);

// Set region of time
date_default_timezone_set("America/Sao_Paulo");

// Show or hide errors
ini_set('display_errors', DISPLAY_ERRORS);
error_reporting(E_ALL);

ob_start();
ob_start("ob_gzhandler");
Source\Core\Session::start();

$route = new Route();
$route->get('/', 'HomeController::index');

$route->dispatch();
