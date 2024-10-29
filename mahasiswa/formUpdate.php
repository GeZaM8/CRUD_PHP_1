<?php
include '../functions.php';

if ($_SESSION['level'] == "user") return header('Location: tampilMahasiswa.php');

$mhs = getMhsByNim($_GET['nim']);

if ($mhs == null) return header('Location: tampilMahasiswa.php');

if (isset($_POST['update'])) {
    if (updateMhs($_POST, $mhs['nim']) > 0) {
        header('Location: tampilMahasiswa.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include '../navbar.php' ?>

    <div class="container mt-5">
        <h2>Form Update Data Mahasiswa</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?= $mhs['nim'] ?>" required autofocus>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $mhs['nama_mhs'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Jenis Kelamin :</label>
                <input type="radio" name="jenkel" id="laki" class="btn-check" value="Laki-laki" <?php if ($mhs['jenis_kelamin'] == "Laki-laki") echo "checked" ?> required>
                <label for="laki" class="btn btn-outline-success">Laki-laki</label>
                <input type="radio" name="jenkel" id="perempuan" class="btn-check" value="Perempuan" <?php if ($mhs['jenis_kelamin'] == "Perempuan") echo "checked" ?> required>
                <label for="perempuan" class="btn btn-outline-success">Perempuan</label>
            </div>
            <div class="mb-3">
                <label for="tglLahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tglLahir" id="tglLahir" value="<?= $mhs['tgl_lahir'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $mhs['alamat'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Submit</button>
            <a href="tampilMahasiswa.php" class="btn btn-danger">Back</a>
        </form>
    </div>
</body>

</html>