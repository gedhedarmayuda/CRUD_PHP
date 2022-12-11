<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once('../config/database.php');
include_once('../api/kelas.php');

$database = new Database();
$db = $database->getConnection();
$item = new Kelas($db);
$show_kelas = $item->showKelas();
$count_kelas = $show_kelas->rowCount();

echo json_encode($count_kelas);
if ($count_kelas > 0) {
    $kelasArr = array();
    $kelasArr["body"] = array();
    $kelasArr["count_kelas"] = $count_kelas;
    while ($row = $show_kelas->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "kode_kelas" => $kode_kelas,
            "kapasitas" => $kapasitas,
            "meja" => $meja,
            "bangku" => $bangku,
            "papan_tulis" => $papan_tulis,
        );
        array_push($kelasArr["body"], $e);
    }
    echo json_encode($kelasArr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "Data tidak ditemukkan")
    );
}
?>