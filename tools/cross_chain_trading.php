<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
}

include '../header.php';
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cross-Chain Trading</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Cross-Chain Trading</h2>
        <form method="post" action="process_trading.php">
            <div class="form-group">
                <label for="fromChain">From Chain:</label>
                <input type="text" class="form-control" id="fromChain" name="fromChain" required>
            </div>
            <div class="form-group">
                <label for="toChain">To Chain:</label>
                <input type="text" class="form-control" id="toChain" name="toChain" required>
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" class="form-control" id="amount" name="amount" required>
            </div>
            <button type="submit" class="btn btn-primary">Execute Trade</button>
        </form>
        <div id="tradingResult" class="mt-4"></div>
    </div>
</body>
</html>