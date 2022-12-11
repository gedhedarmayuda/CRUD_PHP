<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once('D:/Percobaan/AndroidStudioProjects/CRUD_PHP/config/database.php');
include_once('D:/Percobaan/AndroidStudioProjects/CRUD_PHP/class/siswa.php');

$database = new Database();
$db = $database->getConnection();
$siswa = new Siswa($db);
$show_siswa = $siswa->showSiswa();
$count_siswa = $show_siswa->rowCount();

echo json_encode($count_siswa);
if ($count_siswa > 0) {
    $siswaArr = array();
    $siswaArr["body"] = array();
    $siswaArr["count_kelas"] = $count_siswa;
    while ($row = $show_siswa->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "no_siswa" => $no_siswa,
            "nama_siswa" => $nama_siswa,
            "alamat" => $alamat,
            "tempat_lahir" => $tempat_lahir,
            "tgl_lahir" => $tgl_lahir,
            "nama_wali" => $nama_wali,
        );
        array_push($siswaArr["body"], $e);
    }
    echo json_encode($siswaArr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "Data tidak ditemukkan")
    );
}
?>