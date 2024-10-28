<?php
include '../functions.php';

if (isset($_POST['insert'])) {
    if (insertMapel($_POST) > 0) {
        header('Location: tampilMapel.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Data Mata Pelajaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include '../navbar.php' ?>

    <div class="container mt-5">
        <h2>Form Tambah Data Mata Pelajaran</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mapel</label>
                <input type="text" class="form-control" id="nama" name="nama" required autofocus>
            </div>
            <div class="mb-3">
                <label for="sks" class="form-label">Jumlah SKS</label>
                <input type="number" class="form-control" id="sks" name="sks" required>
            </div>
            <div class="mb-3">
                <label for="dosen" class="form-label">Nama Dosen</label>
                <input type="text" class="form-control" name="dosen" id="dosen" required>
            </div>
            <button type="submit" class="btn btn-primary" name="insert">Submit</button>
            <a href="tampilMapel.php" class="btn btn-danger">Back</a>
        </form>
    </div>
</body>

</html>