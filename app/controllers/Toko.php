<?php

class Toko extends Controller
{
    public function index()
    {
        // $user = $this->model('User')->get('aris');
        $hargabagunan = $this->model('BangunanModel')->detailBangunan('arbg02');
        $havebangunan = $this->model('BangunanModel')->haveBangunan($_SESSION['auth']['iduser']);
        // var_dump($hargabagunan);
        $data['hargabangunan'] = $hargabagunan;
        $data['user'] = $_SESSION['auth'];
        $temp = [];
        foreach($havebangunan as $bangunan) {
            array_push($temp,$bangunan['idbangunan']);
        }
        $data['havebangunan'] = $temp;
        $data['tier'] = $this->tier($_SESSION['auth']['tierpoin']);
        $this->view('toko', $data);
    }
    
    public function add($bangunan)
    {
        // $user = $this->model('User')->get('aris');
        $data['user'] = $_SESSION['auth']['iduser'];
        $data['bangunan'] = $bangunan;
        $hargabangunan = $this->model('BangunanModel')->detailBangunan('arbg02');
        foreach ($hargabangunan as $key) {
            if ($key['idbangunan']==$bangunan) {
                $harga = $key['nilaiatribut'];
            }
        }
        if ($this->model('BangunanModel')->buyBangunan($data) > 0) {
            $this->model('User')->edit($_SESSION['auth']['iduser'], 'uang', $_SESSION['auth']['uang']-$harga);
            $x = $this->model('User')->get($_SESSION['auth']['username']);
            $_SESSION['auth'] = $x[0];
            header('location: ' . BASEURL . '/toko');
            exit;
        }
    }
}