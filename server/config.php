<?php
// Function to load .env file
function loadEnv($path) {
    if (!file_exists($path)) {
        return false;
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        if (strpos($line, '=') !== false) {
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);
            
            // Remove quotes if present
            if (preg_match('/^"(.*)"$/', $value, $matches)) {
                $value = $matches[1];
            } elseif (preg_match("/^'(.*)'$/", $value, $matches)) {
                $value = $matches[1];
            }

            if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                putenv(sprintf('%s=%s', $name, $value));
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }
        }
    }
    return true;
}

// Try to load .env from parent directory (project root)
$envPath = __DIR__ . '/../.env';
loadEnv($envPath);

// Configuration
$apiKey = getenv('LEADCONNECTOR_API_KEY');
$locationId = getenv('LEADCONNECTOR_LOCATION_ID');

// Build API URL with location ID for Private Integration Tokens
if (!empty($locationId)) {
    $apiUrl = 'https://services.leadconnectorhq.com/contacts/';
} else {
    $apiUrl = 'https://services.leadconnectorhq.com/contacts/';
}
?>
