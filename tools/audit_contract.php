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
    <title>Smart Contract Auditor</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Audit Smart Contract</h2>
        <form method="post" action="process_audit.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="contractCode">Smart Contract Code:</label>
                <textarea class="form-control" id="contractCode" name="contractCode" rows="10" required></textarea>
            </div>
            <div class="form-group">
                <label for="contractFile">Upload Contract File:</label>
                <input type="file" class="form-control" id="contractFile" name="contractFile">
            </div>
            <button type="submit" class="btn btn-primary">Audit Contract</button>
        </form>
        <div id="auditResult" class="mt-4"></div>
    </div>
</body>
</html>