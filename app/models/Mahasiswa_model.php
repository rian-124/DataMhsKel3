<?php 


class Mahasiswa_model {

    
    private $table = 'mahasiswa';
    private $db;


    public function __construct() 
    {
        $this->db = new Database;
    }
    

    public function getAllMahasiswa() {
        $this->db->querry('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id) {
        $this->db->querry('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data) {
        $querry = "INSERT INTO " . $this->table . " VALUES ('', :nama, :nim, :email, :jurusan)";

        $this->db->querry($querry);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteDataMahasiswa($id) {
        $querry = "DELETE FROM " . $this->table . " WHERE id = :id";

        $this->db->querry($querry);
        $this->db->bind('id',$id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data) {
        $querry = "UPDATE " . $this->table . " SET 
                    nama = :nama,
                    nim = :nim,
                    email = :email,
                    jurusan = :jurusan
                    WHERE id = :id";

        $this->db->querry($querry);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
        
    }

    public function cariDataMahasiswa() {
        $keyword = $_POST['keyword'];
        $querry = "SELECT * FROM " . $this->table . " WHERE nama LIKE :keyword";

        $this->db->querry($querry);
        $this->db->bind('keyword', "%$keyword%");

        return $this->db->resultSet();
    }
}