<?php

class TestCarrera extends CI_Controller {

    public function index() {
        echo "Hello Carrera\n";
    }

    public function produce() {
        $this->load->library('carrera/Carrera');
        $data = json_encode([
            'a' => 'Hello',
            'b' => 'World',
        ]);
        $ret = $this->carrera->send('tp1', $data, Carrera::PARTITION_RAND, 0);
        var_dump($ret);
    }

}