<?php 


Class Jurusan_Models {
    private $table = 'jurusan';
    private $db;

    public function __construct() 
    {
        $this->db = new Database;
    }


    public function getAllJurusan () 
    {
        $this->db->querry('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function cariDataJurusan () 
    {
        $keyword = $_POST['jurusan'];
        $query = "SELECT * FROM " . $this->table . " WHERE nama_jurusan LIKE :jurusan";

        $this->db->querry($query);
        $this->db->bind('jurusan', "%$keyword%");
        return $this->db->resultSet();
    }

    public function tambahDataJurusan($data) {
        $query = "INSERT INTO " . $this->table . " VALUES ('', :nama_jurusan)";
        $this->db->querry($query);
        $this->db->bind('nama_jurusan', $data['nama_jurusan']);
        $this->db->execute();
    
        return $this->db->rowCount();
    }

    
}