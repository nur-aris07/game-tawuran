<?php

class BangunanModel
{
    private $tabel = 'bangunan';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function detailBangunan($filter)
    {
        $query = "SELECT * FROM " . $this->tabel . " JOIN detailbangunan ON " . $this->tabel . ".idbangunan = detailbangunan.idbangunan WHERE NOT (bangunan=:sekolah OR bangunan=:tembok) AND idatribut=:atribut";
        $this->db->query($query);
        $this->db->bind('sekolah', 'Sekolah');
        $this->db->bind('tembok', 'Tembok');
        $this->db->bind('atribut', $filter);
        $this->db->execute();
        return $this->db->resultSet();        
    }

    public function atributBangunan($filter)
    {
        $query = "SELECT * FROM " . $this->tabel . " JOIN detailbangunan ON " . $this->tabel . ".idbangunan = detailbangunan.idbangunan WHERE idatribut=:atribut";
        $this->db->query($query);
        $this->db->bind('atribut', $filter);
        $this->db->execute();
        return $this->db->resultSet();        
    }
    
    public function allAtributBangunan($bangunan)
    {
        $query = "SELECT * FROM " . $this->tabel . " JOIN detailbangunan ON " . $this->tabel . ".idbangunan = detailbangunan.idbangunan JOIN atributbangunan ON detailbangunan.idatribut=atributbangunan.idatribut WHERE bangunan.idbangunan=:bangunan";
        $this->db->query($query);
        $this->db->bind('bangunan', $bangunan);
        $this->db->execute();
        return $this->db->resultSet();        
    }

    public function haveBangunan($user)
    {
        $query = "SELECT * FROM memilikibangunan JOIN " . $this->tabel ." ON memilikibangunan.idbangunan = " . $this->tabel . ".idbangunan WHERE iduser=:user";
        $this->db->query($query);
        $this->db->bind('user',$user);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function buyBangunan($data)
    {
        $query = "INSERT INTO memilikibangunan VALUES (:user, :bangunan, :lvl)";
        $this->db->query($query);
        $this->db->bind('user', $data['user']);
        $this->db->bind('bangunan', $data['bangunan']);
        $this->db->bind('lvl',1);
        $this->db->execute();
        return $this->db->rowCount();
    }
}