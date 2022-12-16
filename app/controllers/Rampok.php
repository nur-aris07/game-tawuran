<?php

class Rampok extends Controller
{
    public function uang()
    {
        $bangunan = $this->model('BangunanModel')->allAtributBangunan('bg06');
        $temp = [];
        foreach ($bangunan as $key) {
            $temp[$key['idatribut']] = $key['nilaiatribut'];
        }
        $bangunan = $temp;
        $setnow = strtotime("+6 hours");
        $setthen = strtotime("+".$bangunan['arbg09']." seconds",$setnow);
        $now = date("Y-m-d h:i:sa", $setnow);
        $then = date("Y-m-d h:i:sa", $setthen);
        $data['now'] = $now;
        $data['then'] = $then;
        $data['user'] = $_SESSION['auth']['iduser'];
        $uang = $this->model('RampokModel')->showUang($_SESSION['auth']['iduser']);
        if (count($uang) == 0) {
            if ( $this->model('RampokModel')->adduang($data) > 0) {
                if ($this->model('User')->edit($_SESSION['auth']['iduser'], 'uang', $bangunan['arbg08']+$_SESSION['auth']['uang']) > 0) {
                    $x = $this->model('User')->get($_SESSION['auth']['username']);
                    $_SESSION['auth'] = $x[0];
                    Flasher::setFlash('Koperasi', 'Melakukan claim uang', 'BERHASIL', 'success');
                    header('location: ' . BASEURL . '/mainmenu');
                    exit;
                } else {var_dump('1');}
            } else {var_dump('2');}
        } else {
            if ($setnow >= strtotime($uang[0]['endtime'])) {
                if ( $this->model('RampokModel')->resetUang($data) > 0) {
                    if ($this->model('User')->edit($_SESSION['auth']['iduser'], 'uang', $bangunan['arbg08']+$_SESSION['auth']['uang']) > 0) {
                        $x = $this->model('User')->get($_SESSION['auth']['username']);
                        $_SESSION['auth'] = $x[0];
                        Flasher::setFlash('Koperasi', 'Melakukan claim uang', 'BERHASIL', 'success');
                        header('location: ' . BASEURL . '/mainmenu');
                        exit;
                    }
                }
            } else {
                Flasher::setFlash('Koperasi', 'Melakukan claim uang, karena belum saatnya', 'GAGAL', 'danger');
                header('location: ' . BASEURL . '/mainmenu');
                exit;
            }
        }
    }
    
    public function makanan()
    {
        $bangunan = $this->model('BangunanModel')->allAtributBangunan('bg02');
        $temp = [];
        foreach ($bangunan as $key) {
            $temp[$key['idatribut']] = $key['nilaiatribut'];
        }
        $bangunan = $temp;
        $setnow = strtotime("+6 hours");
        $setthen = strtotime("+".$bangunan['arbg09']." seconds",$setnow);
        $now = date("Y-m-d h:i:sa", $setnow);
        $then = date("Y-m-d h:i:sa", $setthen);
        $data['now'] = $now;
        $data['then'] = $then;
        $data['user'] = $_SESSION['auth']['iduser'];
        $makanan = $this->model('RampokModel')->showMakanan($_SESSION['auth']['iduser']);
        if (count($makanan) == 0) {
            if ( $this->model('RampokModel')->addMakanan($data) > 0) {
                if ($this->model('User')->edit($_SESSION['auth']['iduser'], 'makanan', $bangunan['arbg07']+$_SESSION['auth']['makanan']) > 0) {
                    $x = $this->model('User')->get($_SESSION['auth']['username']);
                    $_SESSION['auth'] = $x[0];
                    Flasher::setFlash('Kantin', 'Melakukan claim uang', 'BERHASIL', 'success');
                    header('location: ' . BASEURL . '/mainmenu');
                    exit;
                } else {var_dump('1');}
            } else {var_dump('2');}
        } else {
            if ($setnow >= strtotime($makanan[0]['endtime'])) {
                if ( $this->model('RampokModel')->resetMakanan($data) > 0) {
                    if ($this->model('User')->edit($_SESSION['auth']['iduser'], 'makanan', $bangunan['arbg07']+$_SESSION['auth']['makanan']) > 0) {
                        $x = $this->model('User')->get($_SESSION['auth']['username']);
                        $_SESSION['auth'] = $x[0];
                        Flasher::setFlash('Kantin', 'Melakukan claim uang', 'BERHASIL', 'success');
                        header('location: ' . BASEURL . '/mainmenu');
                        exit;
                    }
                }
            } else {
                Flasher::setFlash('Kantin', 'Melakukan claim uang, karena belum saatnya', 'GAGAL', 'danger');
                header('location: ' . BASEURL . '/mainmenu');
                exit;
            }
        }
    }
}