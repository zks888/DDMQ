<?php
namespace didi\carrera\consumer\proxy;

/**
 * Autogenerated by Thrift Compiler (0.9.2)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Type\TType;
use Thrift\Exception\TProtocolException;

class Result {
  static $_TSPEC;

  /**
   * @var int
   */
  public $code = null;
  /**
   * @var string
   */
  public $msg = null;
  /**
   * @var string
   */
  public $key = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'code',
          'type' => TType::I32,
          ),
        2 => array(
          'var' => 'msg',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'key',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['code'])) {
        $this->code = $vals['code'];
      }
      if (isset($vals['msg'])) {
        $this->msg = $vals['msg'];
      }
      if (isset($vals['key'])) {
        $this->key = $vals['key'];
      }
    }
  }

  public function getName() {
    return 'Result';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->code);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->msg);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->key);
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

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('Result');
    if ($this->code !== null) {
      $xfer += $output->writeFieldBegin('code', TType::I32, 1);
      $xfer += $output->writeI32($this->code);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->msg !== null) {
      $xfer += $output->writeFieldBegin('msg', TType::STRING, 2);
      $xfer += $output->writeString($this->msg);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->key !== null) {
      $xfer += $output->writeFieldBegin('key', TType::STRING, 3);
      $xfer += $output->writeString($this->key);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class RestMessage {
  static $_TSPEC;

  /**
   * @var int
   */
  public $type = 1;
  /**
   * @var int
   */
  public $mode = 1;
  /**
   * @var string
   */
  public $url = null;
  /**
   * @var array
   */
  public $params = null;
  /**
   * @var array
   */
  public $headers = null;
  /**
   * @var int
   */
  public $timestamp = null;
  /**
   * @var int
   */
  public $expire = null;
  /**
   * @var int
   */
  public $timeout = null;
  /**
   * @var int
   */
  public $retryCnt = 3;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'type',
          'type' => TType::BYTE,
          ),
        2 => array(
          'var' => 'mode',
          'type' => TType::BYTE,
          ),
        3 => array(
          'var' => 'url',
          'type' => TType::STRING,
          ),
        4 => array(
          'var' => 'params',
          'type' => TType::MAP,
          'ktype' => TType::STRING,
          'vtype' => TType::STRING,
          'key' => array(
            'type' => TType::STRING,
          ),
          'val' => array(
            'type' => TType::STRING,
            ),
          ),
        5 => array(
          'var' => 'headers',
          'type' => TType::MAP,
          'ktype' => TType::STRING,
          'vtype' => TType::STRING,
          'key' => array(
            'type' => TType::STRING,
          ),
          'val' => array(
            'type' => TType::STRING,
            ),
          ),
        6 => array(
          'var' => 'timestamp',
          'type' => TType::I64,
          ),
        7 => array(
          'var' => 'expire',
          'type' => TType::I64,
          ),
        8 => array(
          'var' => 'timeout',
          'type' => TType::I64,
          ),
        9 => array(
          'var' => 'retryCnt',
          'type' => TType::I32,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['type'])) {
        $this->type = $vals['type'];
      }
      if (isset($vals['mode'])) {
        $this->mode = $vals['mode'];
      }
      if (isset($vals['url'])) {
        $this->url = $vals['url'];
      }
      if (isset($vals['params'])) {
        $this->params = $vals['params'];
      }
      if (isset($vals['headers'])) {
        $this->headers = $vals['headers'];
      }
      if (isset($vals['timestamp'])) {
        $this->timestamp = $vals['timestamp'];
      }
      if (isset($vals['expire'])) {
        $this->expire = $vals['expire'];
      }
      if (isset($vals['timeout'])) {
        $this->timeout = $vals['timeout'];
      }
      if (isset($vals['retryCnt'])) {
        $this->retryCnt = $vals['retryCnt'];
      }
    }
  }

  public function getName() {
    return 'RestMessage';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::BYTE) {
            $xfer += $input->readByte($this->type);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::BYTE) {
            $xfer += $input->readByte($this->mode);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->url);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::MAP) {
            $this->params = array();
            $_size0 = 0;
            $_ktype1 = 0;
            $_vtype2 = 0;
            $xfer += $input->readMapBegin($_ktype1, $_vtype2, $_size0);
            for ($_i4 = 0; $_i4 < $_size0; ++$_i4)
            {
              $key5 = '';
              $val6 = '';
              $xfer += $input->readString($key5);
              $xfer += $input->readString($val6);
              $this->params[$key5] = $val6;
            }
            $xfer += $input->readMapEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 5:
          if ($ftype == TType::MAP) {
            $this->headers = array();
            $_size7 = 0;
            $_ktype8 = 0;
            $_vtype9 = 0;
            $xfer += $input->readMapBegin($_ktype8, $_vtype9, $_size7);
            for ($_i11 = 0; $_i11 < $_size7; ++$_i11)
            {
              $key12 = '';
              $val13 = '';
              $xfer += $input->readString($key12);
              $xfer += $input->readString($val13);
              $this->headers[$key12] = $val13;
            }
            $xfer += $input->readMapEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 6:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->timestamp);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 7:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->expire);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 8:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->timeout);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 9:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->retryCnt);
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

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('RestMessage');
    if ($this->type !== null) {
      $xfer += $output->writeFieldBegin('type', TType::BYTE, 1);
      $xfer += $output->writeByte($this->type);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->mode !== null) {
      $xfer += $output->writeFieldBegin('mode', TType::BYTE, 2);
      $xfer += $output->writeByte($this->mode);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->url !== null) {
      $xfer += $output->writeFieldBegin('url', TType::STRING, 3);
      $xfer += $output->writeString($this->url);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->params !== null) {
      if (!is_array($this->params)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('params', TType::MAP, 4);
      {
        $output->writeMapBegin(TType::STRING, TType::STRING, count($this->params));
        {
          foreach ($this->params as $kiter14 => $viter15)
          {
            $xfer += $output->writeString($kiter14);
            $xfer += $output->writeString($viter15);
          }
        }
        $output->writeMapEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    if ($this->headers !== null) {
      if (!is_array($this->headers)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('headers', TType::MAP, 5);
      {
        $output->writeMapBegin(TType::STRING, TType::STRING, count($this->headers));
        {
          foreach ($this->headers as $kiter16 => $viter17)
          {
            $xfer += $output->writeString($kiter16);
            $xfer += $output->writeString($viter17);
          }
        }
        $output->writeMapEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    if ($this->timestamp !== null) {
      $xfer += $output->writeFieldBegin('timestamp', TType::I64, 6);
      $xfer += $output->writeI64($this->timestamp);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->expire !== null) {
      $xfer += $output->writeFieldBegin('expire', TType::I64, 7);
      $xfer += $output->writeI64($this->expire);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->timeout !== null) {
      $xfer += $output->writeFieldBegin('timeout', TType::I64, 8);
      $xfer += $output->writeI64($this->timeout);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->retryCnt !== null) {
      $xfer += $output->writeFieldBegin('retryCnt', TType::I32, 9);
      $xfer += $output->writeI32($this->retryCnt);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class Message {
  static $_TSPEC;

  /**
   * @var string
   */
  public $topic = null;
  /**
   * @var string
   */
  public $key = null;
  /**
   * @var string
   */
  public $value = null;
  /**
   * @var int
   */
  public $hashId = null;
  /**
   * @var string
   */
  public $tags = null;
  /**
   * @var int
   */
  public $partitionId = -1;
  /**
   * @var string
   */
  public $body = null;
  /**
   * @var string
   */
  public $version = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'topic',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'key',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'value',
          'type' => TType::STRING,
          ),
        4 => array(
          'var' => 'hashId',
          'type' => TType::I64,
          ),
        5 => array(
          'var' => 'tags',
          'type' => TType::STRING,
          ),
        6 => array(
          'var' => 'partitionId',
          'type' => TType::I32,
          ),
        7 => array(
          'var' => 'body',
          'type' => TType::STRING,
          ),
        8 => array(
          'var' => 'version',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['topic'])) {
        $this->topic = $vals['topic'];
      }
      if (isset($vals['key'])) {
        $this->key = $vals['key'];
      }
      if (isset($vals['value'])) {
        $this->value = $vals['value'];
      }
      if (isset($vals['hashId'])) {
        $this->hashId = $vals['hashId'];
      }
      if (isset($vals['tags'])) {
        $this->tags = $vals['tags'];
      }
      if (isset($vals['partitionId'])) {
        $this->partitionId = $vals['partitionId'];
      }
      if (isset($vals['body'])) {
        $this->body = $vals['body'];
      }
      if (isset($vals['version'])) {
        $this->version = $vals['version'];
      }
    }
  }

  public function getName() {
    return 'Message';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->topic);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->key);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->value);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->hashId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 5:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->tags);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 6:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->partitionId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 7:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->body);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 8:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->version);
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

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('Message');
    if ($this->topic !== null) {
      $xfer += $output->writeFieldBegin('topic', TType::STRING, 1);
      $xfer += $output->writeString($this->topic);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->key !== null) {
      $xfer += $output->writeFieldBegin('key', TType::STRING, 2);
      $xfer += $output->writeString($this->key);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->value !== null) {
      $xfer += $output->writeFieldBegin('value', TType::STRING, 3);
      $xfer += $output->writeString($this->value);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->hashId !== null) {
      $xfer += $output->writeFieldBegin('hashId', TType::I64, 4);
      $xfer += $output->writeI64($this->hashId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->tags !== null) {
      $xfer += $output->writeFieldBegin('tags', TType::STRING, 5);
      $xfer += $output->writeString($this->tags);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->partitionId !== null) {
      $xfer += $output->writeFieldBegin('partitionId', TType::I32, 6);
      $xfer += $output->writeI32($this->partitionId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->body !== null) {
      $xfer += $output->writeFieldBegin('body', TType::STRING, 7);
      $xfer += $output->writeString($this->body);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->version !== null) {
      $xfer += $output->writeFieldBegin('version', TType::STRING, 8);
      $xfer += $output->writeString($this->version);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class Notify {
  static $_TSPEC;

  /**
   * @var string
   */
  public $topic = null;
  /**
   * @var string
   */
  public $key = null;
  /**
   * @var \didi\carrera\consumer\proxy\RestMessage
   */
  public $value = null;
  /**
   * @var int
   */
  public $ptag = -1;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'topic',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'key',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'value',
          'type' => TType::STRUCT,
          'class' => '\didi\carrera\consumer\proxy\RestMessage',
          ),
        4 => array(
          'var' => 'ptag',
          'type' => TType::I32,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['topic'])) {
        $this->topic = $vals['topic'];
      }
      if (isset($vals['key'])) {
        $this->key = $vals['key'];
      }
      if (isset($vals['value'])) {
        $this->value = $vals['value'];
      }
      if (isset($vals['ptag'])) {
        $this->ptag = $vals['ptag'];
      }
    }
  }

  public function getName() {
    return 'Notify';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->topic);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->key);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRUCT) {
            $this->value = new \didi\carrera\consumer\proxy\RestMessage();
            $xfer += $this->value->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->ptag);
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

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('Notify');
    if ($this->topic !== null) {
      $xfer += $output->writeFieldBegin('topic', TType::STRING, 1);
      $xfer += $output->writeString($this->topic);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->key !== null) {
      $xfer += $output->writeFieldBegin('key', TType::STRING, 2);
      $xfer += $output->writeString($this->key);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->value !== null) {
      if (!is_object($this->value)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('value', TType::STRUCT, 3);
      $xfer += $this->value->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->ptag !== null) {
      $xfer += $output->writeFieldBegin('ptag', TType::I32, 4);
      $xfer += $output->writeI32($this->ptag);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}


