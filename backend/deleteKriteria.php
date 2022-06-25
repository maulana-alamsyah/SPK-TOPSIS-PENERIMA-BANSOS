<?php
require_once '../config/koneksi.php';

$raw = file_get_contents('php://input');
$data = json_decode($raw);

// echo json_encode($data->nim);


$sql = "SELECT * FROM tbl_kriteria WHERE id='" . $data->id . "'";
$result = $db->mysqli->query($sql);

foreach ($result as $row) {
    $lower = strtolower($row['kode']);
}

$sql = "DELETE FROM tbl_kriteria WHERE id='" . $data->id . "'";
$result = $db->mysqli->query($sql);


$deleteColumn = "ALTER TABLE tbl_penilaian DROP COLUMN " . $lower . ";";
$result_deleteColumn = $db->mysqli->query($deleteColumn);

$obj = new stdClass();
if($result > 0) {
    $obj->status = "success";
} else {
    $obj->status = "fail";
}

echo json_encode($obj);
?>