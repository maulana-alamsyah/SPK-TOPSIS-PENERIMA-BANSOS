<?php
require_once '../config/koneksi.php';

$rawData = file_get_contents('php://input');
$data = (array)json_decode($rawData);
$jumlah_kriteria = count($data) - 1;
$query = "UPDATE tbl_penilaian SET";
for ($i=1; $i <= $jumlah_kriteria ; $i++) {
    $namaKolom = "c00"  . $i;
    $kolomAkhir = "c00" . $jumlah_kriteria;
    if($namaKolom == $kolomAkhir){
        $query .= " " . $namaKolom . "='" . $data[$namaKolom] . "' WHERE nama='" . $data['nama'] . "'";
    }else{
        $query .= " " . $namaKolom . "='" . $data[$namaKolom] . "',";
    }
}

/* $sql = "UPDATE tbl_penilaian SET " .
       "  c001='" . $data->c001 . "'," .
       "  c002='" . $data->c002 . "'," .
       "  c003='" . $data->c003 . "'," .
       "  c004='" . $data->c004 . "'," .
       "  c005='" . $data->c005 . "'," .
       "  c006='" . $data->c006 . "'" .
       "WHERE nama='" . $data->nama . "'"; */
$result = $db->mysqli->query($query);
$obj = new stdClass();
if($result > 0) {
    $obj->result = "success";
} else {
    $obj->result = "failed";
}
echo json_encode($obj);
?>