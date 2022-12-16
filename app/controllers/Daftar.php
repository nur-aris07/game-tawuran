<?php

class Daftar extends Controller
{
    public function index()
    {
        $this->view('daftar');
    }

    public function tambah()
    {
        if ($this->model('User')->tambah($_POST) > 0) {
            // $data['user'] = 
            // $this->model('BangunanModel')->buyBangunan($data);
            header('location: ' . BASEURL . '/login');
            exit;
        }
    }
}