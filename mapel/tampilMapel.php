<?php
include '../functions.php';
if (!isset($_SESSION['user'])) return header('Location: ' . BASE_URL . 'login.php');

$result = getAllMapel();

if (isset($_GET['id_mapel'])) {
    deleteMapel($_GET['id_mapel']);
    header('Location: tampilMapel.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mata Pelajaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include '../navbar.php' ?>

    <div class="container mt-5">
        <h2>Data Mata Pelajaran</h2>
        <?php if ($_SESSION['level'] == "admin" || $_SESSION['level'] == "operator"): ?>
            <a href="formTambah.php" class="btn btn-success">Tambah Data Mata Pelajaran</a>
        <?php endif; ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id Mapel</th>
                    <th>Nama Mapel</th>
                    <th>Jumlah SKS</th>
                    <th>Nama Dosen</th>
                    <?php if ($_SESSION['level'] == "admin" || $_SESSION['level'] == "operator"): ?>
                        <th>Aksi</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php while ($mpl = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <th><?= $mpl["id_mapel"] ?></th>
                        <td><?= $mpl["nama_mapel"] ?></td>
                        <td><?= $mpl["jumlah_sks"] ?></td>
                        <td><?= $mpl["nama_dosen"] ?></td>
                        <td>
                            <?php if ($_SESSION['level'] == "admin" || $_SESSION['level'] == "operator"): ?>
                                <a href="formUpdate.php?id_mapel=<?= $mpl['id_mapel'] ?>" class="btn btn-primary">Edit</a>
                            <?php endif; ?>
                            <?php if ($_SESSION['level'] == "admin"): ?>
                                <a href="?id_mapel=<?= $mpl['id_mapel'] ?>" class="btn btn-danger" onclick="confirm('Ini akan menghapus mata pelajaran\nApakah anda yakin menghapusnya?')">Delete</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>