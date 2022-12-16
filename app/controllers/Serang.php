<?php

class Serang extends Controller
{
    public function index()
    {
        // $user = $this->model('User')->get('aris');
        $data['user'] = $_SESSION['auth'];
        $data['tier'] = $this->tier($_SESSION['auth']['tierpoin']);
        $this->view('serang', $data);
    }

    public function getenemy()
    {
        $user = $this->model('User')->getExcept($_SESSION['auth']['username']);
        $user = $user[rand(0,count($user)-1)];
        $bangunan = $this->model('BangunanModel')->haveBangunan($user['iduser']);
        $bangunan = count($bangunan);
        $data['user'] = $user;
        $data['bangunan'] = $bangunan;
        echo json_encode( $data );
    }

    public function attack()
    {
        $troops = $this->model('PasukanModel')->detailPasukan();

        $defends['HP'] = $this->model('BangunanModel')->atributBangunan('arbg01');
        $defends['ATK'] = $this->model('BangunanModel')->atributBangunan('arbg04');

        $xtentara = $this->model('PasukanModel')->havePasukan($_SESSION['auth']['iduser']);
        $tentara = [];
        for ($i=0; $i < count($xtentara); $i++) { 
            for ($j=0; $j < $xtentara[$i]['jumlah']; $j++) { 
                array_push($tentara, $xtentara[$i]);
            }
        }

        $desa = $this->model('BangunanModel')->haveBangunan($_POST['id']);
        $penyerangan = true;
        if ($tentara==[]) {
            $penyerangan = false;
            $maxHPdesa = 0;
            $destroyedHP = 0;
        } else if ($desa==[]) {
            $penyerangan = true;
            $maxHPdesa = 0;
            $destroyedHP = 0;
        } else {
            $loop = true;
            $temp = $this->getAtkDef($tentara,$desa);
            $bangHP = [];
            for ($i=0; $i<count($desa); $i++) {
                array_push($bangHP, $this->getValue($defends['HP'], $desa[$i]['idbangunan'], 'idbangunan', 'nilaiatribut'));
            }
            $maxHPdesa = $this->totalHP($bangHP);
            $pasHP = [];
            for ($i=0; $i<count($tentara); $i++) {
                array_push($pasHP, $this->getValue($troops, $tentara[$i]['idpasukan'], 'idpasukan', 'hp'));
                
            }
            
            while ($loop) {
                for ($i=0; $i < count($desa); $i++) { 
                    $atk = 0;
                    for ($j=0; $j < count($tentara); $j++) { 
                        if ($temp[0][$j]==$i && $tentara[$j]!=null) {
                            $atk += $this->getValue($troops, $tentara[$j]['idpasukan'], 'idpasukan', 'atk');
                        }
                    }
                    $sisa = $bangHP[$i] - $atk;
                    if ($sisa<=0) {
                        for ($j=0; $j < count($temp[0]); $j++) { 
                            if ($temp[0][$j]==$i) {
                                $temp[0][$j] = null;
                            }
                        }
                        $bangHP[$i] = 0;
                        $desa[$i] = null;
                        $temp = $this->getAtkDef($tentara, $desa, $temp[0], $temp[1]);
                    } else {
                        $bangHP[$i] = $sisa;
                    }
                }
    
                for ($i=0; $i < count($tentara); $i++) { 
                    $atk = 0;
                    for ($j=0; $j < count($desa); $j++) { 
                        if ($temp[1][$j]==$i && $desa[$j]!=null) {
                            $atk += $this->getValue($defends['ATK'], $desa[$j]['idbangunan'],'idbangunan', 'nilaiatribut');
                        }
                    }
                    $sisa = $pasHP[$i] - $atk;
                    if ($sisa<=0) {
                        for ($j=0; $j < count($temp[1]); $j++) { 
                            if ($temp[1][$j]==$i) {
                                $temp[1][$j] = null;
                            }
                        }
                        $pasHP[$i] = 0;
                        $tentara[$i] = null;
                        $temp = $this->getAtkDef($tentara, $desa, $temp[0], $temp[1]);
                    } else {
                        $pasHP[$i] = $sisa;
                    }
                }
                if ($this->totalHP($bangHP)==0) {
                    $penyerangan = true;
                    $loop = false;
                    $destroyedHP = $this->totalHP($bangHP);
                } else if ($this->totalHP($pasHP)==0) {
                    $penyerangan = false;
                    $loop = false;
                    $destroyedHP = $this->totalHP($bangHP);
                }
            }
        }
        if ($maxHPdesa==0) {
            $rate = 0;
        } else {
            $rate = $destroyedHP/$maxHPdesa;
        }
        $data['attacker'] = $_SESSION['auth']['iduser'];
        $data['defender'] = $_POST['id'];
        $data['waktu'] = date("Y-m-d h:i:sa", strtotime("+6 hours"));
        if ($penyerangan) {
            $data['exp'] = round(800);
            $data['uang'] = round(3800);
            $data['makanan'] = round(6000);
            $data['tierpoin'] = round(10);
        } else {
            $data['exp'] = 0;
            $data['uang'] = 0;
            $data['makanan'] = 0;
            $data['tierpoin'] = 0;
        }
        $data['rate'] = $rate;
        $data['attack'] = $penyerangan;
        $this->model('PertempuranModel')->add($data);
        $this->model('User')->edit($data['attacker'], 'tierpoin', $_SESSION['auth']['tierpoin']+$data['tierpoin']);
        $this->model('User')->edit($data['attacker'], 'exp', $_SESSION['auth']['exp']+$data['exp']);
        $this->model('User')->edit($data['attacker'], 'uang', $_SESSION['auth']['uang']+$data['uang']);
        $this->model('User')->edit($data['attacker'], 'makanan', $_SESSION['auth']['makanan']+$data['makanan']);
        $x = $this->model('User')->get($_SESSION['auth']['username']);
        $_SESSION['auth'] = $x[0];
        $data['session'] = $x[0];
        $this->model('PasukanModel')->destroy($data['attacker']);
        echo json_encode( $data );
    }

    public function totalHP($array)
    {
        $total = 0;
        for ($i=0; $i < count($array); $i++) { 
            $total += $array[$i];
        }
        return $total;
    }

    public function getValue($data, $id, $atribut, $valueatribut)
    {
        $value = 0;
        foreach ($data as $key) {
            if ($key[$atribut]==$id) {
                $value = $key[$valueatribut];
                break;
            }
        }
        return $value;
    }

    public function getAtkDef($pasukan, $bangunan, $onpas=[], $onbang=[])
    {
        for ($i=0; $i<count($pasukan); $i++) {
            if (!array_key_exists($i, $onpas)) {
                $exe = true;
                while ($exe) {
                    $num = rand(0, count($bangunan) - 1);
                    if ($bangunan[$num] != null) {
                        $onpas[$i] = $num;
                        $exe = false;
                    }
                }
            } else if ($onpas[$i]==null) {
                $onpas[$i] = rand(0, count($bangunan) - 1);
            }
        }

        for ($i=0; $i<count($bangunan); $i++) {
            if (!array_key_exists($i, $onbang)) {
                $exe = true;
                while ($exe) {
                    $num = rand(0, count($pasukan) - 1);
                    if ($pasukan[$num]!=null) {
                        $onbang[$i] = $num;
                        $exe = false;
                    }
                }
            } else if ($onbang[$i]==null) {
                $onbang[$i] = rand(0, count($pasukan) - 1);
            }
        }

        return [$onpas, $onbang];
    }
}