<?php
require_once '../config/koneksi.php';

$rawData = file_get_contents('php://input');
$data = json_decode($rawData);
$sql = "INSERT INTO tbl_penilaian (nama, c001, c002, c003, c004, c005, c006) VALUES ('" . $data->nama . "'," .  "'" . $data->c001 . "'," . "'" . $data->c002 . "'," . "'" . $data->c003 . "'," . "'" . $data->c004 . "'," .  "'" . $data->c005 . "'," . "'" . $data->c006 . "')";
$result = $db->mysqli->query($sql);
$obj = new stdClass();
if($result > 0) {
    $obj->result = "success";
} else {
    $obj->result = "failed";
}
echo json_encode($obj);
?>