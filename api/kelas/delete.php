<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once('D:/Percobaan/AndroidStudioProjects/CRUD_PHP/config/database.php');
include_once('D:/Percobaan/AndroidStudioProjects/CRUD_PHP/class/kelas.php');

$database = new Database();
$db = $database->getConnection();
$item = new Kelas($db);
$data = json_decode(file_get_contents("php://input"));
$item->kode_kelas = $data->kode_kelas;
if ($item->deleteKelas()) {
    echo json_encode("Kelas dihapus");
} else {
    echo json_encode("Kelas tidak bisa dihapus");
}
?>