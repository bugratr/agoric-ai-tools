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
    <title>Smart Contract Generator</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Create Smart Contract</h2>
        <form method="post" action="process_contract.php">
            <div class="form-group">
                <label for="contractName">Contract Name:</label>
                <input type="text" class="form-control" id="contractName" name="contractName" required>
            </div>
            <div class="form-group">
                <label for="contractDetails">Contract Details:</label>
                <textarea class="form-control" id="contractDetails" name="contractDetails" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Generate Contract</button>
        </form>
        <div id="generatedContract" class="mt-4"></div>
    </div>
</body>
</html>