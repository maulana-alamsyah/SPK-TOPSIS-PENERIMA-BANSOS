<?php
require_once '../config/koneksi.php';

$rawData = file_get_contents('php://input');
$data = json_decode($rawData);

$sql = "UPDATE tbl_kriteria SET " .
       "  kode='" . $data->kode . "'," .
       "  nama='" . $data->nama . "'," .
       "  bobot='" . $data->bobot . "'," .
       "  jenis='" . $data->jenis . "'" .
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