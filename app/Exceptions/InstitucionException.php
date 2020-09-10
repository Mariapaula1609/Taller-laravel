<?php

namespace App\Exceptions;
use Venoudev\Results\Exceptions\BaseException;

class InstitucionException extends BaseException
{
  public function __construct(string $status = "FAIL", int $code = 400, Throwable $previous = null){

      parent::__construct($status, $code, $previous);
      $this->result->fail();
      $this->result->setCode($code);
      $this->result->setDescription('Los datos para registrar la institucion no son correctos');
      $this->addMessage('CHECK_DATA','datos errones');
  }
}
