<?php
include '../functions.php';
if (!isset($_SESSION['user'])) return header('Location: ' . BASE_URL . 'login.php');

$result = getAllMhs();

if (isset($_GET['nim'])) {
    if ($_SESSION['level'] == "user" || $_SESSION['level'] == 'operator') return header('Location: tampilMahasiswa.php');
    deleteMhs($_GET['nim']);
    header('Location: tampilMahasiswa.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include '../navbar.php' ?>

    <div class="container mt-5">
        <h2>Data Mahasiswa</h2>
        <?php if ($_SESSION['level'] == "admin" || $_SESSION['level'] == "operator"): ?>
            <a href="formTambah.php" class="btn btn-success">Tambah Data Mahasiswa</a>
        <?php endif; ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <?php if ($_SESSION['level'] == "admin" || $_SESSION['level'] == "operator"): ?>
                        <th>Aksi</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php while ($mhs = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <th><?= $mhs["nim"] ?></th>
                        <td><?= $mhs["nama_mhs"] ?></td>
                        <td><?= $mhs["jenis_kelamin"] ?></td>
                        <td><?= $mhs["tgl_lahir"] ?></td>
                        <td><?= $mhs["alamat"] ?></td>
                        <td>
                            <?php if ($_SESSION['level'] == "admin" || $_SESSION['level'] == "operator"): ?>
                                <a href="formUpdate.php?nim=<?= $mhs['nim'] ?>" class="btn btn-primary">Edit</a>
                            <?php endif; ?>
                            <?php if ($_SESSION['level'] == "admin"): ?>
                                <a href="?nim=<?= $mhs['nim'] ?>" class="btn btn-danger" onclick="confirm('Ini akan menghapus mahasiswa\nApakah anda yakin menghapusnya?')">Delete</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>