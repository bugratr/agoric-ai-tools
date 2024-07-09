<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "User session not found.";
    exit();
}

$user = $_SESSION['user'];
$apikey = 'your_openai_api_key';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contractCode'])) {
    $contractCode = $_POST['contractCode'];

    $prompt = "Audit the following Agoric smart contract code for security and compliance issues: $contractCode";

    $postData = json_encode([
        "model" => "text-davinci-003",
        "prompt" => $prompt,
        "max_tokens" => 1500
    ]);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/completions");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "Authorization: Bearer " . $apikey
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response, true);

    if (isset($result['choices'][0]['text'])) {
        $auditResult = $result['choices'][0]['text'];

        echo '<div class="mt-4">
                <h3>Audit Result</h3>
                <pre>' . htmlspecialchars($auditResult) . '</pre>
              </div>';
    } else {
        echo "Unexpected API response: ";
        print_r($result);
    }
} else {
    echo "Invalid request.";
}
?>