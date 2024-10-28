<?php

function login($data)
{
    global $con;
    $username = $data['username'];
    $password = $data['password'];

    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($con, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user == null || $user['aktif'] == 0) return 0;
    if ($user['password'] != $password) return 0;

    $_SESSION['user'] = $user['username'];
    $_SESSION['level'] = $user['hak_akses'];

    return mysqli_affected_rows($con);
}
