<?php
require_once '../config/koneksi.php';

$rawData = file_get_contents('php://input');
$data = json_decode($rawData);

$sql = "SELECT * FROM tbl_penilaian WHERE nama='" . $data->nama . "'";
$result = $db->mysqli->query($sql);

$data = array();
foreach ($result as $row) {
    $data[] = array_map('strtolower', $row);
}
echo json_encode($data);
?>