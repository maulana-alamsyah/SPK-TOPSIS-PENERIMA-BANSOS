<?php
include("../config/koneksi.php");

$rawData = file_get_contents('php://input');
$data = json_decode($rawData);

$result = $db->mysqli->query("SELECT * FROM tbl_kriteria");

$obj = new stdClass();
$obj->nama = $data->nama;
$obj->jumlah = $result->num_rows;
print_r(json_encode($obj));
?>