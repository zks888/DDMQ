<?php

class Consumer extends CI_Controller {

    public function index() {
        echo "Hello Carrera Consumer\n";
    }

    public function test() {
        $this->load->library('carrera/ThriftConsumer');
        $ret = $this->thriftconsumer->pull('cg_1', 'tp1');
        var_dump($ret);
    }
}