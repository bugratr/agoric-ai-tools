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
    <title>DeFi Portfolio Management</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Manage DeFi Portfolio</h2>
        <form method="post" action="process_portfolio.php">
            <div class="form-group">
                <label for="asset">Asset:</label>
                <input type="text" class="form-control" id="asset" name="asset" required>
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" class="form-control" id="amount" name="amount" required>
            </div>
            <button type="submit" class="btn btn-primary">Manage Portfolio</button>
        </form>
        <div id="portfolioResult" class="mt-4"></div>
    </div>
</body>
</html>