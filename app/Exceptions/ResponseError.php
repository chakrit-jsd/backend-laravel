<?php

namespace App\Exceptions;

class ResponseError extends CustomException
{
    public static function DBException($e): ResponseError
    {
        return new self(message: $e->getMessage(), code: 402);
    }
}
