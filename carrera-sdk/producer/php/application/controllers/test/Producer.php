<?php

class Producer extends CI_Controller {

    public function index() {
        echo "Hello Carrera Producer\n";
    }

    public function test() {
        $this->load->library('carrera/ThriftProducer');
        $data = json_encode([
            'a' => 'Hello',
            'b' => 'World',
        ]);
        for ($i=0;$i<100;$i++) {
            $ret = $this->thriftproducer->send('tp1', $data, ThriftProducer::PARTITION_RAND, 0);
            var_dump($ret);
        }
    }
}