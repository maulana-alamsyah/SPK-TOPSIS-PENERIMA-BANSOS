<?php
require_once '../config/koneksi.php';

$raw = file_get_contents('php://input');
$data = json_decode($raw);


$sql = "INSERT INTO tbl_alternatif(nama) VALUES('" . $data->nama . "')";

$result = $db->mysqli->query($sql);

$obj = new stdClass();
if($result > 0) {
    $obj->result = "success";
} else {
    $obj->result = "failed";
}
echo json_encode($obj);
?>