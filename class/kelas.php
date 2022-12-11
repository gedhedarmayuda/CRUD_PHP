<?php
class Kelas
{
    private $conn;
    private $db_table = "kelas";
    public $kode_kelas;
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
    public function deleteKelas(){
        $sql = "DELETE FROM " . $this->db_table . " WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
    
        $this->kode_kelas=htmlspecialchars(strip_tags($this->kode_kelas));
    
        $stmt->bindParam(1, $this->kode_kelas);
    
        if($stmt->execute()){
            return true;
        }
        return false;
    }
}
?>