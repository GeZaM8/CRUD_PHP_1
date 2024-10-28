<?php

function getAllMapel()
{
    global $con;
    $sql = "SELECT * FROM mata_pelajaran";
    $result = mysqli_query($con, $sql);

    return $result;
}

function getMapelById($id)
{
    global $con;

    $query = "SELECT * FROM mata_pelajaran WHERE id_mapel = $id";
    $result = mysqli_query($con, $query);
    $mpl = mysqli_fetch_assoc($result);

    return $mpl;
}

function insertMapel($data)
{
    global $con;

    $nama = $data['nama'];
    $sks = $data['sks'];
    $dosen = $data['dosen'];

    $query = "INSERT INTO mata_pelajaran VALUES
                (0 , '$nama', '$sks', '$dosen')";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

function updateMapel($data, $id)
{
    global $con;

    $nama = $data['nama'];
    $sks = $data['sks'];
    $dosen = $data['dosen'];

    $query = "UPDATE mata_pelajaran SET 
            nama_mapel = '$nama', 
            jumlah_sks = '$sks', 
            nama_dosen = '$dosen'
            WHERE id_mapel = $id";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

function deleteMapel($id)
{
    global $con;

    $query = "DELETE FROM mata_pelajaran WHERE id_mapel = $id";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}
