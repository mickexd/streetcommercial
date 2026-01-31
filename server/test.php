<?php
// Simple test script to verify PHP is working and .env is loaded
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require_once 'config.php';

$response = [
    'status' => 'success',
    'message' => 'PHP is working correctly',
    'php_version' => phpversion(),
    'server_software' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown',
    'api_key_loaded' => !empty($apiKey) && $apiKey !== 'YOUR_LEADCONNECTOR_API_KEY',
    'api_key_length' => !empty($apiKey) ? strlen($apiKey) : 0,
    'curl_available' => function_exists('curl_init'),
    'env_file_exists' => file_exists(__DIR__ . '/../.env'),
    'current_directory' => __DIR__,
    'request_method' => $_SERVER['REQUEST_METHOD'],
];

echo json_encode($response, JSON_PRETTY_PRINT);
?>
