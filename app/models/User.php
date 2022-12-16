<?php

class User
{
    private $tabel = 'users';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function get($filter='')
    {
        $query = ('SELECT * FROM ' . $this->tabel . ' WHERE username LIKE :filter');
        $this->db->query($query);
        $this->db->bind('filter', $filter);
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $query = ('SELECT * FROM ' . $this->tabel . ' WHERE iduser = :id');
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }
    
    public function getExcept($filter)
    {
        $query = ('SELECT * FROM ' . $this->tabel . ' WHERE NOT username=:filter');
        $this->db->query($query);
        $this->db->bind('filter', $filter);
        return $this->db->resultSet();
    }

    public function tambah($data)
    {
        $query = "INSERT INTO " . $this->tabel .  " VALUES (:id, :nama, :email, :pass, :tierpoin, :experient, :uang, :makanan)";
        $this->db->query($query);
        $user = 'user'.rand(1,9999);
        $this->db->bind('id', $user);
        $this->db->bind('nama', $data['username']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('pass', $data['password']);
        $this->db->bind('tierpoin', 0);
        $this->db->bind('experient', 0);
        $this->db->bind('uang', 5000);
        $this->db->bind('makanan',1000);
        $this->db->execute();
        $result = $this->db->rowCount();
        
        $query = "INSERT INTO memilikibangunan VALUES (:user, :bangunan, :lvl)";
        $this->db->query($query);
        $this->db->bind('user', $user);
        $this->db->bind('bangunan', 'bg01');
        $this->db->bind('lvl',1);
        $this->db->execute();
        return $result;
    }

    public function edit($user, $atr, $val)
    {
        $query = 'UPDATE ' . $this->tabel . ' SET ' . $atr . '=:value WHERE iduser=:user';
        $this->db->query($query);
        $this->db->bind('user', $user);
        $this->db->bind('value', $val);
        $this->db->execute();
        return $this->db->rowCount();
    }
}