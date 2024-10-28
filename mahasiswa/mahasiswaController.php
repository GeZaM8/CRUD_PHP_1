<?php

function getAllMhs()
{
    global $con;
    $sql = "SELECT * FROM mahasiswa";
    $result = mysqli_query($con, $sql);

    return $result;
}

function getMhsByNim($nim)
{
    global $con;

    $query = "SELECT * FROM mahasiswa WHERE nim = $nim";
    $result = mysqli_query($con, $query);
    $mhs = mysqli_fetch_assoc($result);

    return $mhs;
}

function insertMhs($data)
{
    global $con;

    $nim = $data['nim'];
    $nama = $data['nama'];
    $jenkel = $data['jenkel'];
    $tglLahir = $data['tglLahir'];
    $alamat = $data['alamat'];

    $query = "INSERT INTO mahasiswa VALUES
                ($nim , '$nama', '$jenkel', '$tglLahir', '$alamat')";

    try {
        mysqli_query($con, $query);
    } catch (Exception $e) {
        throw new Exception();
    }

    return mysqli_affected_rows($con);
}

function updateMhs($data, $nim)
{
    global $con;

    $oldNim = $nim;
    $newNim = $data['nim'];
    $nama = $data['nama'];
    $jenkel = $data['jenkel'];
    $tglLahir = $data['tglLahir'];
    $alamat = $data['alamat'];

    $query = "UPDATE mahasiswa SET 
            nim = $newNim, 
            nama_mhs = '$nama', 
            jenis_kelamin = '$jenkel', 
            tgl_lahir = '$tglLahir', 
            alamat = '$alamat' 
            WHERE nim = $oldNim";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

function deleteMhs($nim)
{
    global $con;

    $query = "DELETE FROM mahasiswa WHERE nim = $nim";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}
