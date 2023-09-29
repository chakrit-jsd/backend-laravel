<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\QueryException;
use Throwable;

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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (CustomException $e) {

            return response()->json([
                'message' => $e->getMessage(),
            ], $e->getCode());
        });

        $this->renderable(function (QueryException $e) {

            switch ($e->getCode()) {
                case '23000':
                    $message = 'Duplicate Email';
                    $code = 409;
                    break;
                default:
                    $message = 'Server Error';
                    $code = 500;
            }

            return response()->json([
                'success' => false,
                'message' => $message,
                'data' => null,
                'code' => $code,
            ], $code);
        });
    }
}
