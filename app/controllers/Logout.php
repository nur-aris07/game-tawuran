<?php

class Logout extends Controller
{
    public function index()
    {
        unset($_SESSION['auth']);
        header('location: ' . BASEURL . '/login');
    }

    public function cek()
    {
        var_dump($_SESSION['auth']);
    }
}