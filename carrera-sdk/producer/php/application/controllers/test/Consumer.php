<?php

/**
 * @property ThriftConsumer thriftconsumer
 */
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

    public function consume() {
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
            if ($this->callback($message->value)) {
                $aSuccessOffsets[] = $message->offset;
            } else {
                $aFailOffsets[] = $message->offset;
            }
        }
        $ret = $this->thriftconsumer->submit($context, $aSuccessOffsets, $aFailOffsets);
        var_dump($ret);
    }

    private function callback($value) {
        echo "msg: ".$value."\r\n";
        return (mt_rand(1,100) > 50);
    }
}