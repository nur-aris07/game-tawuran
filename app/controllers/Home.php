<?php

class Home extends Controller
{
    public function index()
    {
        $data['users'] = $this->model('User')->get();
        $this->view('home', $data);
    }

    public function tambah()
    {
        if ($this->model('User')->tambah($_POST) > 0) {
            header('location:');
            exit;
        }
    }
}