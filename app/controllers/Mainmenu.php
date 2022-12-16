<?php

class Mainmenu extends Controller
{
    public function index()
    {
        // $user = $this->model('User')->get('aris');
        $bangunan = $this->model('BangunanModel')->haveBangunan($_SESSION['auth']['iduser']);
        $data['user'] = $_SESSION['auth'];
        $data['bangunan'] = $bangunan;
        $rampok = [
            'bg02' => 'makanan',
            'bg04' => 'spell',
            'bg06' => 'uang'
        ];
        $data['rampok'] = $rampok;
        $data['tier'] = $this->tier($_SESSION['auth']['tierpoin']);
        // var_dump($data['user']);
        $this->view('mainmenu',$data);
    }
}