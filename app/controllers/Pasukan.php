<?php

class Pasukan extends Controller
{
    public function index()
    {
        // $user = $this->model('User')->get('aris');
        $troops = $this->model('PasukanModel')->detailPasukan();
        // var_dump($troops);
        $pasukan = $this->model('PasukanModel')->havePasukan($_SESSION['auth']['iduser']);
        $data['user'] = $_SESSION['auth'];
        $data['troops'] = $troops;
        $data['pasukan'] = $pasukan;
        $data['tier'] = $this->tier($_SESSION['auth']['tierpoin']);
        $this->view('pasukan', $data);
    }

    public function latih()
    {
        // $user = $this->model('User')->get('aris');
        $kapasitas = $this->model('Bangunanmodel')->atributBangunan('arbg06');
        $kapasitas = $kapasitas[0]['nilaiatribut'];
        $trained = $this->model('PasukanModel')->havePasukan($_SESSION['auth']['iduser']);
        $havepasukan = [];

        foreach ($trained as $key) {
            $havepasukan[$key['idpasukan']] = $key['jumlah'];
        }
        $temp = 0;
        foreach ($trained as $key) {
            $temp += $key['jumlah'] * $key['muatan'];
        }
        $trained = $temp;
        $pasukan = $this->model('PasukanModel')->detailPasukan($_POST['pasukan']);
        $harga = $_POST['jml'] * $pasukan[0]['harga'];
        $pasukan = $pasukan[0]['muatan'] * $_POST['jml'];
        if ( ($kapasitas-($trained+$pasukan)) < 0 || ($_SESSION['auth']['makanan']-$harga) < 0 ) {
            Flasher::setFlash('Pasukan','Berlatih, mmungkin dikarenakan Kapasitas telah penuh atau makanan kurang','GAGAL','danger');
            header('location: ' . BASEURL . '/pasukan');
            exit;
        } else if (array_key_exists($_POST['pasukan'],$havepasukan)) {
            $data['user'] = $_SESSION['auth'];
            $data['pasukan'] = $_POST;
            $data['pasukan']['jml'] = $_POST['jml'] + $havepasukan[$_POST['pasukan']];
            if ($this->model('PasukanModel')->risePasukan($data) > 0) {
                $this->model('User')->edit($_SESSION['auth']['iduser'], 'makanan', $_SESSION['auth']['makanan']-$harga);
                $x = $this->model('User')->get($_SESSION['auth']['username']);
                $_SESSION['auth'] = $x[0];
                header('location: ' . BASEURL . '/pasukan');
                exit;
            }
        } else {
            $data['user'] = $_SESSION['auth'];
            $data['pasukan'] = $_POST;
            if ($this->model('PasukanModel')->trainPasukan($data) > 0) {
                $this->model('User')->edit($_SESSION['auth']['iduser'], 'makanan', $_SESSION['auth']['makanan']-$harga);
                $x = $this->model('User')->get($_SESSION['auth']['username']);
                $_SESSION['auth'] = $x[0];
                header('location: ' . BASEURL . '/pasukan');
                exit;
            }
        }
    }
}