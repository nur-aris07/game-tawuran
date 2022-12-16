<?php

class Flasher
{
    public static function setFlash($objek, $pesan, $aksi, $type)
    {
        $_SESSION['flash'] = [
            'objek' => $objek,
            'pesan' => $pesan,
            'aksi' => $aksi,
            'type' => $type
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-'. $_SESSION['flash']['type'] .' alert-dismissible fade show" role="alert">'.$_SESSION['flash']['objek'].' <strong>'. $_SESSION['flash']['aksi'] .'</strong> '. $_SESSION['flash']['pesan'] .'.</div>';
            unset ($_SESSION['flash']);
        }
    }
}