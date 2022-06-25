<?php
require_once '../config/koneksi.php';

$raw = file_get_contents('php://input');
$data = json_decode($raw);


$sql = "INSERT INTO tbl_kriteria(kode, nama, bobot, jenis) VALUES('" .
    $data->kode . "','" . $data->nama . "','" . $data->bobot . "','" . $data->jenis . "')";
$result = $db->mysqli->query($sql);

$lower = strtolower($data->kode);

$addColumn = "ALTER TABLE tbl_penilaian ADD " . $lower . " varchar (50);";
$result_addColumn = $db->mysqli->query($addColumn);
$obj = new stdClass();
if($result > 0) {
    $obj->result = "success";
} else {
    $obj->result = "failed";
}
echo json_encode($obj);
?>