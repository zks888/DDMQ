<?php

/**
 * @property ThriftConsumer thriftconsumer
 */
class Consumer extends CI_Controller {

    public function index() {
        echo "Hello Carrera Consumer\n";
    }

    public function consume() {
        $this->load->library('carrera/ThriftConsumer');
        $j = 0;
        for ($i=0;$i<20000;$i++) {
            $ret = $this->thriftconsumer->pull('cg_local_test_0_0', 'local_test_0');
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
            $j++;
            echo $j;
        }
    }

    private function callback($value) {
        //sleep(1);
        file_put_contents(APPPATH . 'logs/11.log', $value."\r\n", FILE_APPEND);
        return true;
    }
}