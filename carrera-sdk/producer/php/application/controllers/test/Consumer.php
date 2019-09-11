<?php

class Consumer extends CI_Controller {

    public function index() {
        echo "Hello Carrera Consumer\n";
    }

    public function pull() {
        $this->load->library('carrera/ThriftConsumer');
        $ret = $this->thriftconsumer->pull('cg_1', 'tp1');
        var_dump($ret);
    }

    public function fetch() {
        $this->load->library('carrera/ThriftConsumer');
        $ret = $this->thriftconsumer->fetch('cg_1', 'dc76c321ca5a36e8c94dd58313e2321b');
        var_dump($ret);
    }

    public function ack() {
        $this->load->library('carrera/ThriftConsumer');
        $ret = $this->thriftconsumer->pull('cg_1', 'tp1');
        var_dump($ret);
        if ($ret['code'] > 0) {
            return;
        }
        $context = $ret['ret']['context'];
        $ret = $this->thriftconsumer->ack('cg_1', $context['']);
        var_dump($ret);
    }

    public function submit() {
        $this->load->library('carrera/ThriftConsumer');
        $ret = $this->thriftconsumer->pull('cg_1', 'tp1');
        if ($ret['code'] > 0) {
            var_dump($ret);
            return;
        }
        $context = $ret['ret']['context'];
        $messages = $ret['ret']['messages'];
        $aSuccessOffsets = [];
        $aFailOffsets = [];
        foreach ($messages as $message) {
            if (mt_rand(1,100) > 50) {
                $aSuccessOffsets[] = $message->offset;
            } else {
                $aFailOffsets[] = $message->offset;
            }
            echo "msg: ".$message->value."\r\n";
        }
        $ret = $this->thriftconsumer->submit($context, $aSuccessOffsets, $aFailOffsets);
        var_dump($ret);
    }

    public function getConsumeStats() {
        $this->load->library('carrera/ThriftConsumer');
        $ret = $this->thriftconsumer->getConsumeStats('cg_1', 'tp1');
        var_dump($ret);
    }
}