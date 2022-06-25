<?php
require_once '../config/koneksi.php';

$rawData = file_get_contents('php://input');
$data = json_decode($rawData);

$namaSebelum = "SELECT nama FROM tbl_alternatif " .
       "WHERE id='" . $data->id . "'";
$result = $db->mysqli->query($namaSebelum);
foreach ($result as $rows) {
    $getIdPenilaian = "SELECT id FROM tbl_penilaian " .
    "WHERE nama='" . $rows['nama'] . "'";
    $result1 = $db->mysqli->query($getIdPenilaian);
    foreach ($result1 as $rows) {
        $updatePenilaian = "UPDATE tbl_penilaian SET " .
        "nama='" . $data->nama . "'" .
        "WHERE id='" . $rows['id'] . "'";
        $result = $db->mysqli->query($updatePenilaian);
    }
}



$sql = "UPDATE tbl_alternatif SET " .
       "  nama='" . $data->nama . "'" .
       "WHERE id='" . $data->id . "'";
$result = $db->mysqli->query($sql);
$obj = new stdClass();
if($result > 0) {
    $obj->result = "success";
} else {
    $obj->result = "failed";
}
echo json_encode($obj);
?>