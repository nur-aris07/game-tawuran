<?php

class PasukanModel
{
    private $tabel = 'memilikipasukan';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function havePasukan($user)
    {
        $query = "SELECT * FROM " . $this->tabel . " JOIN pasukan ON " . $this->tabel . ".idpasukan = pasukan.idpasukan WHERE iduser=:userid";
        $this->db->query($query);
        $this->db->bind('userid',$user);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function detailPasukan($pasukan='pasukan')
    {
        $query = "SELECT * FROM pasukan WHERE idpasukan LIKE :pasukan";
        $this->db->query($query);
        $this->db->bind('pasukan', '%'.$pasukan.'%');
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function trainPasukan($data)
    {
        $query = "INSERT INTO " . $this->tabel . " VALUES (:user, :pasukan, :jml)";
        $this->db->query($query);
        $this->db->bind('user', $data['user']['iduser']);
        $this->db->bind('pasukan', $data['pasukan']['pasukan']);
        $this->db->bind('jml', $data['pasukan']['jml']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function risePasukan($data)
    {
        $query = "UPDATE " . $this->tabel . " SET jumlah=:jml WHERE iduser=:user AND idpasukan=:pasukan";
        $this->db->query($query);
        $this->db->bind('user', $data['user']['iduser']);
        $this->db->bind('pasukan', $data['pasukan']['pasukan']);
        $this->db->bind('jml', $data['pasukan']['jml']);
        $this->db->execute();
        return $this->db->rowCount();
    }
        
    public function destroy($user)
    {
        $query = 'DELETE FROM ' . $this->tabel . ' WHERE iduser=:user';
        $this->db->query($query);
        $this->db->bind('user', $user);
        $this->db->execute();
        return $this->db->rowCount();
    }
}