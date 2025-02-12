<?php
if (isset($_GET['prompt'])) {
    $prompt = $_GET['prompt'];
    $apiKey = "AIzaSyCdPw0kiJnQhxPbANaT7kU35zUpve3rDU0"; // Your Gemini API Key
    $apiURL = "https://generativelanguage.googleapis.com/v1beta2/models/gemini-pro:generateText?key=" . $apiKey;

    $postData = json_encode([
        "prompt" => ["text" => $prompt]
    ]);

    $options = [
        "http" => [
            "header" => "Content-Type: application/json",
            "method" => "POST",
            "content" => $postData
        ]
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($apiURL, false, $context);
    
    header("Content-Type: application/json");
    echo $result;
} else {
    echo json_encode(["error" => "No prompt provided."]);
}
?>
