<?php
class Siswa
{
    private $conn;
    private $db_table = "siswa";
    public $no_siswa;
    public $nama_siswa;
    public $alamat;
    public $tempat_lahir;
    public $tanggal_lahir;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function showSiswa()
    {
        $sql = "SELECT * FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    public function createSiswa()
    {
        $sql = "INSERT INTO" . $this->db_table . "SET nama_siswa = :nama_siswa, alamat = :alamat, tempat_lahir = :tempat_lahir, tanggal_lahir = :tanggal_lahir";

        $stmt = $this->conn->prepare($sql);

        $this->nama_siswa = htmlspecialchars(strip_tags($this->nama_siswa));
        $this->alamat = htmlspecialchars(strip_tags($this->alamat));
        $this->tempat_lahir = htmlspecialchars(strip_tags($this->tempat_lahir));
        $this->tanggal_lahir = htmlspecialchars(strip_tags($this->tanggal_lahir));

        $stmt->bindParam(":nama_siswa", $this->nama_siswa);
        $stmt->bindParam(":alamat", $this->alamat);
        $stmt->bindParam(":tempat_lahir", $this->tempat_lahir);
        $stmt->bindParam(":tanggal_lahir", $this->tanggal_lahir);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function updateSiswa()
    {
        $sql = "UPDATE" . $this->db_table . "SET nama_siswa = :nama_siswa, alamat = :alamat, tempat_lahir = :tempat_lahir, tanggal_lahir = :tanggal_lahir WHERE no_siswa = :no_siswa";

        $stmt = $this->conn->prepare($sql);

        $this->nama_siswa = htmlspecialchars(strip_tags($this->nama_siswa));
        $this->alamat = htmlspecialchars(strip_tags($this->alamat));
        $this->tempat_lahir = htmlspecialchars(strip_tags($this->tempat_lahir));
        $this->tanggal_lahir = htmlspecialchars(strip_tags($this->tanggal_lahir));
        $this->no_siswa = htmlspecialchars(strip_tags($this->no_siswa));

        $stmt->bindParam(":nama_siswa", $this->nama_siswa);
        $stmt->bindParam(":alamat", $this->alamat);
        $stmt->bindParam(":tempat_lahir", $this->tempat_lahir);
        $stmt->bindParam(":tanggal_lahir", $this->tanggal_lahir);
        $stmt->bindParam(":no_siswa", $this->no_siswa);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
