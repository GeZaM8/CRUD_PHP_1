<?php
include './functions.php';
if (!isset($_SESSION['user'])) header('Location: login.php');


?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kampus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include './navbar.php' ?>
    <div class="ms-5 mt-3">
        <p>Selamat datang <?= $_SESSION['user'] ?>, kamu adalah <?= $_SESSION['level'] ?></p>
    </div>
</body>

</html>