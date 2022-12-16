<?php

class PertempuranModel
{
    private $tabel = 'pertempuran';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function add($data)
    {
        $query = "INSERT INTO " . $this->tabel . " VALUES ('', :attacker, :defender, :poin, :exp, :uang, :makanan, :waktu)";
        $this->db->query($query);
        $this->db->bind('attacker',$data['attacker']);
        $this->db->bind('defender',$data['defender']);
        $this->db->bind('poin',$data['tierpoin']);
        $this->db->bind('exp',$data['exp']);
        $this->db->bind('uang',$data['uang']);
        $this->db->bind('makanan',$data['makanan']);
        $this->db->bind('waktu',$data['waktu']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}