<?php
class Kelas
{
    private $conn;
    private $db_table = "kelas";
    public $kode_kelas;
    public $kapasitas;
    public $meja;
    public $bangku;
    public $papan_tulis;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function showKelas()
    {
        $sql = "SELECT * FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    public function deleteKelas()
    {
        $sql = "DELETE FROM " . $this->db_table . " WHERE kode_kelas = ?";
        $stmt = $this->conn->prepare($sql);

        $this->kode_kelas = htmlspecialchars(strip_tags($this->kode_kelas));

        $stmt->bindParam(1, $this->kode_kelas);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>