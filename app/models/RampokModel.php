<?php

class RampokModel
{
    private $tabel = 'rampok';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function showUang($user)
    {
        $query = 'SELECT * FROM ' . $this->tabel .' WHERE iduser=:user AND idbangunan=:bangunan';
        $this->db->query($query);
        $this->db->bind('user',$user);
        $this->db->bind('bangunan','bg06');
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function addUang($data)
    {
        $query = 'INSERT INTO ' . $this->tabel . ' VALUES (:user, :bangunan, :start, :end)';
        $this->db->query($query);
        $this->db->bind('user', $data['user']);
        $this->db->bind('bangunan', 'bg06');
        $this->db->bind('start', $data['now']);
        $this->db->bind('end', $data['then']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function resetUang($data)
    {
        $query = 'UPDATE ' . $this->tabel . ' SET starttime=:start, endtime=:end WHERE iduser=:user AND idbangunan=:bangunan';
        $this->db->query($query);
        $this->db->bind('user', $data['user']);
        $this->db->bind('bangunan', 'bg06');
        $this->db->bind('start', $data['now']);
        $this->db->bind('end', $data['then']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function showMakanan($user)
    {
        $query = 'SELECT * FROM ' . $this->tabel .' WHERE iduser=:user AND idbangunan=:bangunan';
        $this->db->query($query);
        $this->db->bind('user',$user);
        $this->db->bind('bangunan','bg02');
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function addMakanan($data)
    {
        $query = 'INSERT INTO ' . $this->tabel . ' VALUES (:user, :bangunan, :start, :end)';
        $this->db->query($query);
        $this->db->bind('user', $data['user']);
        $this->db->bind('bangunan', 'bg02');
        $this->db->bind('start', $data['now']);
        $this->db->bind('end', $data['then']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function resetMakanan($data)
    {
        $query = 'UPDATE ' . $this->tabel . ' SET starttime=:start, endtime=:end WHERE iduser=:user AND idbangunan=:bangunan';
        $this->db->query($query);
        $this->db->bind('user', $data['user']);
        $this->db->bind('bangunan', 'bg02');
        $this->db->bind('start', $data['now']);
        $this->db->bind('end', $data['then']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}