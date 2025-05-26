<?php
require_once __DIR__ . '/db.php';

class Mahasiswa {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM mahasiswa ORDER BY nim");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function add($nim, $nama, $jurusan, $angkatan, $email) {
        $stmt = $this->db->prepare("INSERT INTO mahasiswa (nim, nama, jurusan, angkatan, email) VALUES (:nim, :nama, :jurusan, :angkatan, :email)");
        $stmt->execute([
            ':nim' => $nim,
            ':nama' => $nama,
            ':jurusan' => $jurusan,
            ':angkatan' => $angkatan,
            ':email' => $email
        ]);
    }
    
    public function delete($nim) {
        $stmt = $this->db->prepare("DELETE FROM mahasiswa WHERE nim = :nim");
        $stmt->execute([':nim' => $nim]);
    }

    public function update($nim, $nama, $jurusan, $angkatan, $email) {
        $stmt = $this->db->prepare("UPDATE mahasiswa SET nama = :nama, jurusan = :jurusan, angkatan = :angkatan, email = :email WHERE nim = :nim");
        $stmt->execute([
            ':nama' => $nama,
            ':jurusan' => $jurusan,
            ':angkatan' => $angkatan,
            ':email' => $email,
            ':nim' => $nim
        ]);
    }
}