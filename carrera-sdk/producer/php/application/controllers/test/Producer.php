<?php
/**
 * @property ThriftProducer thriftproducer
 */
class Producer extends CI_Controller {

    public function index() {
        echo "Hello Carrera Producer\n";
    }

    public function test() {
        $this->load->library('carrera/ThriftProducer');
        for ($i=0;$i<1000;$i++) {
            $data = json_encode([
                'a' => 'Hello',
                'b' => 'World',
                'i' => $i,
            ]);
            $ret = $this->thriftproducer->send('tp1', $data, ThriftProducer::PARTITION_RAND, 0);
            var_dump($ret);
        }
    }

    public function produce() {
        $this->load->library('carrera/ThriftProducer');
        $data = json_encode([
            'a' => 'Hello',
            'b' => 'World',
        ]);
        $ret = $this->thriftproducer->send('tp1', $data, ThriftProducer::PARTITION_RAND, 0);
        var_dump($ret);
    }
}