<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once('D:/Percobaan/AndroidStudioProjects/CRUD_PHP/config/database.php');
include_once('D:/Percobaan/AndroidStudioProjects/CRUD_PHP/class/siswa.php');

$database = new Database();
$db = $database->getConnection();
$siswa = new Siswa($db);
$data = json_decode(file_get_contents("php://input"));
$siswa->no_siswa = $data->no_siswa;

$siswa->nama_siswa = $data->nama_siswa;
$siswa->alamat = $data->alamat;
$siswa->tempat_lahir = $data->tempat_lahir;
$siswa->tgl_lahir = $data->tgl_lahir;
$siswa->nama_wali = $data->nama_wali;

if ($siswa->updateSiswa()) {
    echo "Data Siswa Telah di Input";
} else {
    echo "Data Siswa Gagal di Input";
}
?>