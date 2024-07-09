<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "User session not found.";
    exit();
}

$user = $_SESSION['user'];
$apikey = 'your_openai_api_key';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['asset']) && isset($_POST['amount'])) {
    $asset = $_POST['asset'];
    $amount = $_POST['amount'];
    // Portfolio management logic here
    // For simplicity, we are just displaying the asset and amount
    echo '<div class="mt-4">
            <h3>Portfolio Management Result</h3>
            <p>Asset: ' . htmlspecialchars($asset) . '</p>
            <p>Amount: ' . htmlspecialchars($amount) . '</p>
          </div>';
} else {
    echo "Invalid request.";
}
?>