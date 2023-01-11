<?php


declare(strict_types=1);

require_once './src/Database.php';
require_once './src/ProductController.php';
require_once './src/ErrorHandler.php';
require_once './src/ProductGateway.php';


set_exception_handler("ErrorHandler::handleException");
header('Content-type: application/json; charset=UTF-8');

$parts = explode('/', ($_SERVER['REQUEST_URI']));

if ($parts[3] !== 'products') {
  http_response_code((404));
  exit;
}

$id = $parts[4] ?? null;
$database = new Database("localhost", "3307", "products", "root", "");


$gateway = new ProductGateway($database);
$controller = new ProductController($gateway);
$controller->processCollectionRequest($_SERVER["REQUEST_METHOD"]);


// $database->getConnection();
