<?php
include('config/koneksi.php');
$rawData = file_get_contents('php://input');
$data = json_decode($rawData);


$username = $data->username;
$password = $data->password;
$hash = password_hash($password, PASSWORD_DEFAULT);


$result = $db->mysqli->query("SELECT * FROM tbl_admin where USERNAME='$username'");

if ($result->num_rows > 0) {
    foreach($result as $row)
    {
        if ($row['password'] == $password) {
            $_SESSION['username'] = $username;
            $_SESSION['type'] = 'admin';
            $_SESSION['id'] = $row['id'];
            $_SESSION['login'] = true;
            echo "sukses";
        }else{
            echo "gagal";
        }
    }
}else {
    echo "gagal";
}

?>