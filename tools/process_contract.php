<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "User session not found.";
    exit();
}

$user = $_SESSION['user'];
$apikey = 'your_openai_api_key';
$generatedContract = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contractName']) && isset($_POST['contractDetails'])) {
    $contractName = $_POST['contractName'];
    $contractDetails = $_POST['contractDetails'];

    $prompt = "Generate an Agoric smart contract named $contractName with the following details: $contractDetails. The contract should include offer safety, use Zoe, and be written in JavaScript.";

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
        $generatedContract = $result['choices'][0]['text'];

        echo '<div class="mt-4">
                <h3>Generated Smart Contract</h3>
                <pre>' . htmlspecialchars($generatedContract) . '</pre>
              </div>';
    } else {
        echo "Unexpected API response: ";
        print_r($result);
    }
} else {
    echo "Invalid request.";
}
?>