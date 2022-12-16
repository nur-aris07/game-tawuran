<?php

class Login extends Controller
{
    public function index()
    {
        $this->view('login');
    }

    public function login()
    {
        $user = $this->model('User')->get($_POST['username']);
        if (is_null($_POST)){
            header('location: ' . BASEURL . '/login');
        } else {
            if ($user[0]['username']==$_POST['username']) {
                if ($user[0]['password']==$_POST['passkey']) {
                    $_SESSION['auth'] = $user[0];
                    header('location: ' . BASEURL . '/mainmenu');
                } else {
                    header('location: ' . BASEURL . '/login');
                }
            } else {
                header('location: ' . BASEURL . '/login');
            }
        }
    }
}