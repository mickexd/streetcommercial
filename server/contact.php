<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['message' => 'Method not allowed']);
    exit;
}

require_once 'config.php';

if (empty($apiKey) || $apiKey === 'YOUR_LEADCONNECTOR_API_KEY') {
    http_response_code(500);
    echo json_encode(['message' => 'API Key not configured']);
    exit;
}

if (empty($locationId) || $locationId === 'YOUR_LOCATION_ID_HERE') {
    http_response_code(500);
    echo json_encode(['message' => 'Location ID not configured. Please add LEADCONNECTOR_LOCATION_ID to your .env file']);
    exit;
}

// Get JSON input
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['message' => 'Invalid JSON']);
    exit;
}

$leadName = $data['leadName'] ?? '';
$email = $data['email'] ?? '';
$phone = $data['phone'] ?? '';
$businessName = $data['businessName'] ?? '';

$payload = [
    'locationId' => $locationId,
    'name' => $leadName,
    'email' => $email,
    'phone' => $phone,
    'companyName' => $businessName,
    'source' => 'Website Contact Form'
];

$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey,
    'Version: 2021-07-28'
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);

curl_close($ch);

if ($curlError) {
    http_response_code(500);
    echo json_encode(['message' => 'Server Error: ' . $curlError]);
    exit;
}

$result = json_decode($response, true);

if ($httpCode >= 200 && $httpCode < 300) {
    http_response_code(200);
    echo json_encode(['message' => 'Contact created successfully']);
} else {
    http_response_code($httpCode);
    echo json_encode(['message' => $result['message'] ?? 'Error creating contact in LeadConnector']);
}
?>
