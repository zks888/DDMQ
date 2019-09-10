<?php

namespace didi\carrera\consumer\proxy;
/**
 * Autogenerated by Thrift Compiler (0.9.2)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 * @generated
 */

use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;


interface ConsumerServiceIf
{
    /**
     * @param \didi\carrera\consumer\proxy\Message $message
     * @param int $timeout
     * @return \didi\carrera\consumer\proxy\Result
     */
    public function sendSync(\didi\carrera\consumer\proxy\Message $message, $timeout);

    /**
     * @param \didi\carrera\consumer\proxy\Message[] $messages
     * @return \didi\carrera\consumer\proxy\Result
     */
    public function sendBatchSync(array $messages);

    /**
     * @param \didi\carrera\consumer\proxy\Message $message
     * @return \didi\carrera\consumer\proxy\Result
     */
    public function sendAsync(\didi\carrera\consumer\proxy\Message $message);

    /**
     * @param \didi\carrera\consumer\proxy\Notify $notify
     * @param int $timeout
     * @return \didi\carrera\consumer\proxy\Result
     */
    public function sendNotifySync(\didi\carrera\consumer\proxy\Notify $notify, $timeout);

    /**
     * @param \didi\carrera\consumer\proxy\Notify $notify
     * @return \didi\carrera\consumer\proxy\Result
     */
    public function sendNotifyAsync(\didi\carrera\consumer\proxy\Notify $notify);
}

class ConsumerServiceClient implements \didi\carrera\consumer\proxy\ConsumerServiceIf
{
    protected $input_ = null;
    protected $output_ = null;

    protected $seqid_ = 0;

    public function __construct($input, $output = null)
    {
        $this->input_ = $input;
        $this->output_ = $output ? $output : $input;
    }

    public function sendSync(\didi\carrera\consumer\proxy\Message $message, $timeout)
    {
        $this->send_sendSync($message, $timeout);
        return $this->recv_sendSync();
    }

    public function send_sendSync(\didi\carrera\consumer\proxy\Message $message, $timeout)
    {
        $args = new \didi\carrera\consumer\proxy\ProducerService_sendSync_args();
        $args->message = $message;
        $args->timeout = $timeout;
        $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($this->output_, 'sendSync', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
        } else {
            $this->output_->writeMessageBegin('sendSync', TMessageType::CALL, $this->seqid_);
            $args->write($this->output_);
            $this->output_->writeMessageEnd();
            $this->output_->getTransport()->flush();
        }
    }

    public function recv_sendSync()
    {
        $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
        if ($bin_accel) $result = thrift_protocol_read_binary($this->input_, '\didi\carrera\consumer\proxy\ProducerService_sendSync_result', $this->input_->isStrictRead());
        else {
            $rseqid = 0;
            $fname = null;
            $mtype = 0;

            $this->input_->readMessageBegin($fname, $mtype, $rseqid);
            if ($mtype == TMessageType::EXCEPTION) {
                $x = new TApplicationException();
                $x->read($this->input_);
                $this->input_->readMessageEnd();
                throw $x;
            }
            $result = new \didi\carrera\consumer\proxy\ProducerService_sendSync_result();
            $result->read($this->input_);
            $this->input_->readMessageEnd();
        }
        if ($result->success !== null) {
            return $result->success;
        }
        throw new \Exception("sendSync failed: unknown result");
    }

    public function sendBatchSync(array $messages)
    {
        $this->send_sendBatchSync($messages);
        return $this->recv_sendBatchSync();
    }

    public function send_sendBatchSync(array $messages)
    {
        $args = new \didi\carrera\consumer\proxy\ProducerService_sendBatchSync_args();
        $args->messages = $messages;
        $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($this->output_, 'sendBatchSync', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
        } else {
            $this->output_->writeMessageBegin('sendBatchSync', TMessageType::CALL, $this->seqid_);
            $args->write($this->output_);
            $this->output_->writeMessageEnd();
            $this->output_->getTransport()->flush();
        }
    }

    public function recv_sendBatchSync()
    {
        $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
        if ($bin_accel) $result = thrift_protocol_read_binary($this->input_, '\didi\carrera\consumer\proxy\ProducerService_sendBatchSync_result', $this->input_->isStrictRead());
        else {
            $rseqid = 0;
            $fname = null;
            $mtype = 0;

            $this->input_->readMessageBegin($fname, $mtype, $rseqid);
            if ($mtype == TMessageType::EXCEPTION) {
                $x = new TApplicationException();
                $x->read($this->input_);
                $this->input_->readMessageEnd();
                throw $x;
            }
            $result = new \didi\carrera\consumer\proxy\ProducerService_sendBatchSync_result();
            $result->read($this->input_);
            $this->input_->readMessageEnd();
        }
        if ($result->success !== null) {
            return $result->success;
        }
        throw new \Exception("sendBatchSync failed: unknown result");
    }

    public function sendAsync(\didi\carrera\consumer\proxy\Message $message)
    {
        $this->send_sendAsync($message);
        return $this->recv_sendAsync();
    }

    public function send_sendAsync(\didi\carrera\consumer\proxy\Message $message)
    {
        $args = new \didi\carrera\consumer\proxy\ProducerService_sendAsync_args();
        $args->message = $message;
        $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($this->output_, 'sendAsync', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
        } else {
            $this->output_->writeMessageBegin('sendAsync', TMessageType::CALL, $this->seqid_);
            $args->write($this->output_);
            $this->output_->writeMessageEnd();
            $this->output_->getTransport()->flush();
        }
    }

    public function recv_sendAsync()
    {
        $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
        if ($bin_accel) $result = thrift_protocol_read_binary($this->input_, '\didi\carrera\consumer\proxy\ProducerService_sendAsync_result', $this->input_->isStrictRead());
        else {
            $rseqid = 0;
            $fname = null;
            $mtype = 0;

            $this->input_->readMessageBegin($fname, $mtype, $rseqid);
            if ($mtype == TMessageType::EXCEPTION) {
                $x = new TApplicationException();
                $x->read($this->input_);
                $this->input_->readMessageEnd();
                throw $x;
            }
            $result = new \didi\carrera\consumer\proxy\ProducerService_sendAsync_result();
            $result->read($this->input_);
            $this->input_->readMessageEnd();
        }
        if ($result->success !== null) {
            return $result->success;
        }
        throw new \Exception("sendAsync failed: unknown result");
    }

    public function sendNotifySync(\didi\carrera\consumer\proxy\Notify $notify, $timeout)
    {
        $this->send_sendNotifySync($notify, $timeout);
        return $this->recv_sendNotifySync();
    }

    public function send_sendNotifySync(\didi\carrera\consumer\proxy\Notify $notify, $timeout)
    {
        $args = new \didi\carrera\consumer\proxy\ProducerService_sendNotifySync_args();
        $args->notify = $notify;
        $args->timeout = $timeout;
        $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($this->output_, 'sendNotifySync', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
        } else {
            $this->output_->writeMessageBegin('sendNotifySync', TMessageType::CALL, $this->seqid_);
            $args->write($this->output_);
            $this->output_->writeMessageEnd();
            $this->output_->getTransport()->flush();
        }
    }

    public function recv_sendNotifySync()
    {
        $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
        if ($bin_accel) $result = thrift_protocol_read_binary($this->input_, '\didi\carrera\consumer\proxy\ProducerService_sendNotifySync_result', $this->input_->isStrictRead());
        else {
            $rseqid = 0;
            $fname = null;
            $mtype = 0;

            $this->input_->readMessageBegin($fname, $mtype, $rseqid);
            if ($mtype == TMessageType::EXCEPTION) {
                $x = new TApplicationException();
                $x->read($this->input_);
                $this->input_->readMessageEnd();
                throw $x;
            }
            $result = new \didi\carrera\consumer\proxy\ProducerService_sendNotifySync_result();
            $result->read($this->input_);
            $this->input_->readMessageEnd();
        }
        if ($result->success !== null) {
            return $result->success;
        }
        throw new \Exception("sendNotifySync failed: unknown result");
    }

    public function sendNotifyAsync(\didi\carrera\consumer\proxy\Notify $notify)
    {
        $this->send_sendNotifyAsync($notify);
        return $this->recv_sendNotifyAsync();
    }

    public function send_sendNotifyAsync(\didi\carrera\consumer\proxy\Notify $notify)
    {
        $args = new \didi\carrera\consumer\proxy\ProducerService_sendNotifyAsync_args();
        $args->notify = $notify;
        $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
        if ($bin_accel) {
            thrift_protocol_write_binary($this->output_, 'sendNotifyAsync', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
        } else {
            $this->output_->writeMessageBegin('sendNotifyAsync', TMessageType::CALL, $this->seqid_);
            $args->write($this->output_);
            $this->output_->writeMessageEnd();
            $this->output_->getTransport()->flush();
        }
    }

    public function recv_sendNotifyAsync()
    {
        $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
        if ($bin_accel) $result = thrift_protocol_read_binary($this->input_, '\didi\carrera\consumer\proxy\ProducerService_sendNotifyAsync_result', $this->input_->isStrictRead());
        else {
            $rseqid = 0;
            $fname = null;
            $mtype = 0;

            $this->input_->readMessageBegin($fname, $mtype, $rseqid);
            if ($mtype == TMessageType::EXCEPTION) {
                $x = new TApplicationException();
                $x->read($this->input_);
                $this->input_->readMessageEnd();
                throw $x;
            }
            $result = new \didi\carrera\consumer\proxy\ProducerService_sendNotifyAsync_result();
            $result->read($this->input_);
            $this->input_->readMessageEnd();
        }
        if ($result->success !== null) {
            return $result->success;
        }
        throw new \Exception("sendNotifyAsync failed: unknown result");
    }

}

// HELPER FUNCTIONS AND STRUCTURES

class ProducerService_sendSync_args
{
    static $_TSPEC;

    /**
     * @var \didi\carrera\consumer\proxy\Message
     */
    public $message = null;
    /**
     * @var int
     */
    public $timeout = null;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = array(
                1 => array(
                    'var' => 'message',
                    'type' => TType::STRUCT,
                    'class' => '\didi\carrera\consumer\proxy\Message',
                ),
                2 => array(
                    'var' => 'timeout',
                    'type' => TType::I64,
                ),
            );
        }
        if (is_array($vals)) {
            if (isset($vals['message'])) {
                $this->message = $vals['message'];
            }
            if (isset($vals['timeout'])) {
                $this->timeout = $vals['timeout'];
            }
        }
    }

    public function getName()
    {
        return 'ProducerService_sendSync_args';
    }

    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::STRUCT) {
                        $this->message = new \didi\carrera\consumer\proxy\Message();
                        $xfer += $this->message->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->timeout);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('ProducerService_sendSync_args');
        if ($this->message !== null) {
            if (!is_object($this->message)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('message', TType::STRUCT, 1);
            $xfer += $this->message->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->timeout !== null) {
            $xfer += $output->writeFieldBegin('timeout', TType::I64, 2);
            $xfer += $output->writeI64($this->timeout);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }

}

class ProducerService_sendSync_result
{
    static $_TSPEC;

    /**
     * @var \didi\carrera\consumer\proxy\Result
     */
    public $success = null;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = array(
                0 => array(
                    'var' => 'success',
                    'type' => TType::STRUCT,
                    'class' => '\didi\carrera\consumer\proxy\Result',
                ),
            );
        }
        if (is_array($vals)) {
            if (isset($vals['success'])) {
                $this->success = $vals['success'];
            }
        }
    }

    public function getName()
    {
        return 'ProducerService_sendSync_result';
    }

    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 0:
                    if ($ftype == TType::STRUCT) {
                        $this->success = new \didi\carrera\consumer\proxy\Result();
                        $xfer += $this->success->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('ProducerService_sendSync_result');
        if ($this->success !== null) {
            if (!is_object($this->success)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('success', TType::STRUCT, 0);
            $xfer += $this->success->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }

}

class ProducerService_sendBatchSync_args
{
    static $_TSPEC;

    /**
     * @var \didi\carrera\consumer\proxy\Message[]
     */
    public $messages = null;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = array(
                1 => array(
                    'var' => 'messages',
                    'type' => TType::LST,
                    'etype' => TType::STRUCT,
                    'elem' => array(
                        'type' => TType::STRUCT,
                        'class' => '\didi\carrera\consumer\proxy\Message',
                    ),
                ),
            );
        }
        if (is_array($vals)) {
            if (isset($vals['messages'])) {
                $this->messages = $vals['messages'];
            }
        }
    }

    public function getName()
    {
        return 'ProducerService_sendBatchSync_args';
    }

    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::LST) {
                        $this->messages = array();
                        $_size18 = 0;
                        $_etype21 = 0;
                        $xfer += $input->readListBegin($_etype21, $_size18);
                        for ($_i22 = 0; $_i22 < $_size18; ++$_i22) {
                            $elem23 = null;
                            $elem23 = new \didi\carrera\consumer\proxy\Message();
                            $xfer += $elem23->read($input);
                            $this->messages [] = $elem23;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('ProducerService_sendBatchSync_args');
        if ($this->messages !== null) {
            if (!is_array($this->messages)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('messages', TType::LST, 1);
            {
                $output->writeListBegin(TType::STRUCT, count($this->messages));
                {
                    foreach ($this->messages as $iter24) {
                        $xfer += $iter24->write($output);
                    }
                }
                $output->writeListEnd();
            }
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }

}

class ProducerService_sendBatchSync_result
{
    static $_TSPEC;

    /**
     * @var \didi\carrera\consumer\proxy\Result
     */
    public $success = null;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = array(
                0 => array(
                    'var' => 'success',
                    'type' => TType::STRUCT,
                    'class' => '\didi\carrera\consumer\proxy\Result',
                ),
            );
        }
        if (is_array($vals)) {
            if (isset($vals['success'])) {
                $this->success = $vals['success'];
            }
        }
    }

    public function getName()
    {
        return 'ProducerService_sendBatchSync_result';
    }

    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 0:
                    if ($ftype == TType::STRUCT) {
                        $this->success = new \didi\carrera\consumer\proxy\Result();
                        $xfer += $this->success->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('ProducerService_sendBatchSync_result');
        if ($this->success !== null) {
            if (!is_object($this->success)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('success', TType::STRUCT, 0);
            $xfer += $this->success->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }

}

class ProducerService_sendAsync_args
{
    static $_TSPEC;

    /**
     * @var \didi\carrera\consumer\proxy\Message
     */
    public $message = null;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = array(
                1 => array(
                    'var' => 'message',
                    'type' => TType::STRUCT,
                    'class' => '\didi\carrera\consumer\proxy\Message',
                ),
            );
        }
        if (is_array($vals)) {
            if (isset($vals['message'])) {
                $this->message = $vals['message'];
            }
        }
    }

    public function getName()
    {
        return 'ProducerService_sendAsync_args';
    }

    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::STRUCT) {
                        $this->message = new \didi\carrera\consumer\proxy\Message();
                        $xfer += $this->message->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('ProducerService_sendAsync_args');
        if ($this->message !== null) {
            if (!is_object($this->message)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('message', TType::STRUCT, 1);
            $xfer += $this->message->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }

}

class ProducerService_sendAsync_result
{
    static $_TSPEC;

    /**
     * @var \didi\carrera\consumer\proxy\Result
     */
    public $success = null;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = array(
                0 => array(
                    'var' => 'success',
                    'type' => TType::STRUCT,
                    'class' => '\didi\carrera\consumer\proxy\Result',
                ),
            );
        }
        if (is_array($vals)) {
            if (isset($vals['success'])) {
                $this->success = $vals['success'];
            }
        }
    }

    public function getName()
    {
        return 'ProducerService_sendAsync_result';
    }

    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 0:
                    if ($ftype == TType::STRUCT) {
                        $this->success = new \didi\carrera\consumer\proxy\Result();
                        $xfer += $this->success->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('ProducerService_sendAsync_result');
        if ($this->success !== null) {
            if (!is_object($this->success)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('success', TType::STRUCT, 0);
            $xfer += $this->success->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }

}

class ProducerService_sendNotifySync_args
{
    static $_TSPEC;

    /**
     * @var \didi\carrera\consumer\proxy\Notify
     */
    public $notify = null;
    /**
     * @var int
     */
    public $timeout = null;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = array(
                1 => array(
                    'var' => 'notify',
                    'type' => TType::STRUCT,
                    'class' => '\didi\carrera\consumer\proxy\Notify',
                ),
                2 => array(
                    'var' => 'timeout',
                    'type' => TType::I64,
                ),
            );
        }
        if (is_array($vals)) {
            if (isset($vals['notify'])) {
                $this->notify = $vals['notify'];
            }
            if (isset($vals['timeout'])) {
                $this->timeout = $vals['timeout'];
            }
        }
    }

    public function getName()
    {
        return 'ProducerService_sendNotifySync_args';
    }

    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::STRUCT) {
                        $this->notify = new \didi\carrera\consumer\proxy\Notify();
                        $xfer += $this->notify->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->timeout);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('ProducerService_sendNotifySync_args');
        if ($this->notify !== null) {
            if (!is_object($this->notify)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('notify', TType::STRUCT, 1);
            $xfer += $this->notify->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->timeout !== null) {
            $xfer += $output->writeFieldBegin('timeout', TType::I64, 2);
            $xfer += $output->writeI64($this->timeout);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }

}

class ProducerService_sendNotifySync_result
{
    static $_TSPEC;

    /**
     * @var \didi\carrera\consumer\proxy\Result
     */
    public $success = null;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = array(
                0 => array(
                    'var' => 'success',
                    'type' => TType::STRUCT,
                    'class' => '\didi\carrera\consumer\proxy\Result',
                ),
            );
        }
        if (is_array($vals)) {
            if (isset($vals['success'])) {
                $this->success = $vals['success'];
            }
        }
    }

    public function getName()
    {
        return 'ProducerService_sendNotifySync_result';
    }

    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 0:
                    if ($ftype == TType::STRUCT) {
                        $this->success = new \didi\carrera\consumer\proxy\Result();
                        $xfer += $this->success->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('ProducerService_sendNotifySync_result');
        if ($this->success !== null) {
            if (!is_object($this->success)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('success', TType::STRUCT, 0);
            $xfer += $this->success->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }

}

class ProducerService_sendNotifyAsync_args
{
    static $_TSPEC;

    /**
     * @var \didi\carrera\consumer\proxy\Notify
     */
    public $notify = null;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = array(
                1 => array(
                    'var' => 'notify',
                    'type' => TType::STRUCT,
                    'class' => '\didi\carrera\consumer\proxy\Notify',
                ),
            );
        }
        if (is_array($vals)) {
            if (isset($vals['notify'])) {
                $this->notify = $vals['notify'];
            }
        }
    }

    public function getName()
    {
        return 'ProducerService_sendNotifyAsync_args';
    }

    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::STRUCT) {
                        $this->notify = new \didi\carrera\consumer\proxy\Notify();
                        $xfer += $this->notify->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('ProducerService_sendNotifyAsync_args');
        if ($this->notify !== null) {
            if (!is_object($this->notify)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('notify', TType::STRUCT, 1);
            $xfer += $this->notify->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }

}

class ProducerService_sendNotifyAsync_result
{
    static $_TSPEC;

    /**
     * @var \didi\carrera\consumer\proxy\Result
     */
    public $success = null;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = array(
                0 => array(
                    'var' => 'success',
                    'type' => TType::STRUCT,
                    'class' => '\didi\carrera\consumer\proxy\Result',
                ),
            );
        }
        if (is_array($vals)) {
            if (isset($vals['success'])) {
                $this->success = $vals['success'];
            }
        }
    }

    public function getName()
    {
        return 'ProducerService_sendNotifyAsync_result';
    }

    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 0:
                    if ($ftype == TType::STRUCT) {
                        $this->success = new \didi\carrera\consumer\proxy\Result();
                        $xfer += $this->success->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('ProducerService_sendNotifyAsync_result');
        if ($this->success !== null) {
            if (!is_object($this->success)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('success', TType::STRUCT, 0);
            $xfer += $this->success->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }

}


