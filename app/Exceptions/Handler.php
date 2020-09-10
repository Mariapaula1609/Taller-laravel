<?php

namespace App\Exceptions;

use App\Models\Institucion;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Venoudev\Results\Exceptions\CheckDataException;
use App\Exceptions\InstitucionException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if($exception instanceof CheckDataException)
        {
            $exception = new CheckDataException();
            return $exception->getJsonResponse();
        }

        if($exception instanceof InstitucionException)
        {
            $exception = new InstitucionException();
            return $exception->getJsonResponse();
        }
        return parent::render($request, $exception);
    }
}
