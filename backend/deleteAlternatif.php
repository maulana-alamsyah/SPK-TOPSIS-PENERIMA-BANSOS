<?php
require_once '../config/koneksi.php';

$raw = file_get_contents('php://input');
$data = json_decode($raw);

// echo json_encode($data->nim);
$getNama = "SELECT * FROM tbl_alternatif WHERE id='" . $data->id . "'";
$result = $db->mysqli->query($getNama);
foreach ($result as $row) {
    $nama = $row['nama'];
    $sqlp = "DELETE FROM tbl_penilaian WHERE nama='" . $nama . "'";
    $result = $db->mysqli->query($sqlp);
}


$sql = "DELETE FROM tbl_alternatif WHERE id='" . $data->id . "'";
$result = $db->mysqli->query($sql);



$obj = new stdClass();
if($result > 0) {
    $obj->status = "success";
} else {
    $obj->status = "fail";
}

echo json_encode($obj);
?>