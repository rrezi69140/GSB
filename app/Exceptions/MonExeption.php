<?php

namespace App\Exceptions;
use Exception;

class MonExeption extends  Exception
{
    protected $message = 'Unknow exception';
    private $String;
    protected $code = 0;
    protected $file;
    protected $line;
    private $trace;


    public function __construct($message, $code = 0, Exception $previous = null)
    {
        if (!$message) {
            throw new $this ('Unknown', get_class($this));
        }
        parent::_construct($message, $code);
    }

    public function __toString()
    {
        return get_class($this) . " '{$this ->message}' in {$this ->file} ({$this -> line})\n"
        . "{$this ->getTraceAsString()}";
    }

}




