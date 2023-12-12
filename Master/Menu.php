<?php

namespace Master;

class Menu
{
    public function topMenu()
    {
        $base = "http://localhost/utsnyaluluk/index.php?target=";
        $data = [
            array('Text' => 'Home', 'Link' => $base . 'home'),
            array('Text' => 'pendaftaran', 'Link' => $base . 'pendaftaran'),
            array('Text' => 'pegawai', 'Link' => $base . 'pegawai'),
            array('Text' => 'admin', 'Link' => $base . 'admin'),
        ];
        return $data;
    }
}
