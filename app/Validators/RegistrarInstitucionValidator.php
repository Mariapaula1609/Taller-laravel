<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
use Venoudev\Results\Exceptions\CheckDataException;
use App\Exceptions\InstitucionException;

class RegistrarInstitucionValidator
{
    public static function execute($data){
        
        $validator = Validator::make($data, [
           'nombre'=> ['required'], 
        ]);
        dd($validator);
        if ($validator->fails()) {
            $exception = new CheckDataException();
            $exception->addFieldErrors($validator->errors());
            throw $exception;
        }
        return;

    }
}