<?php

class Consumer extends CI_Controller {

    public function index() {
        echo "Hello Carrera Consumer\n";
    }

    public function test() {
        $this->load->library('carrera/ThriftConsumer');
        $ret = $this->thriftConsumer->pull('tp1', ThriftConsumer::PARTITION_RAND, 0);
        var_dump($ret);
    }
}