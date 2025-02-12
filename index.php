<?php
// Get user prompt
$prompt = isset($_GET['prompt']) ? $_GET['prompt'] : 'Hello';

// Gemini API Key
$api_key = "AIzaSyCdPw0kiJnQhxPbANaT7kU35zUpve3rDU0";

// Gemini API URL
$url = "https://generativelanguage.googleapis.com/v1beta2/models/gemini-pro:generateText?key=$api_key";

// Prepare request data
$data = json_encode([
    "prompt" => [
        "text" => $prompt
    ]
]);

// Send request to Gemini API
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

$response = curl_exec($ch);
curl_close($ch);

// Return API response
header('Content-Type: application/json');
echo $response;
?>
