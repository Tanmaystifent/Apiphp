<?php
if (isset($_GET['prompt'])) {
    $prompt = urlencode($_GET['prompt']);
    $api_key = "AIzaSyCdPw0kiJnQhxPbANaT7kU35zUpve3rDU0";  // Replace with your API key

    $api_url = "https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent?key=$api_key";

    $data = [
        "contents" => [["parts" => [["text" => $prompt]]]]
    ];

    $options = [
        "http" => [
            "header"  => "Content-Type: application/json\r\n",
            "method"  => "POST",
            "content" => json_encode($data),
        ]
    ];

    $context  = stream_context_create($options);
    $result = file_get_contents($api_url, false, $context);

    if ($result === FALSE) {
        echo json_encode(["response" => "Error connecting to Gemini API."]);
    } else {
        echo $result;
    }
} else {
    echo json_encode(["response" => "No prompt provided."]);
}
?>