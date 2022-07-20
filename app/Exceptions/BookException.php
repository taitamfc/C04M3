<?php

namespace App\Exceptions;

use Exception;

class BookException extends Exception
{
    public function report()
    {
        \Log::debug('Book not found');
    }

    public function render($request)
    {
        return false;
        // return response()->view('errors.user');
        echo 123;
    }
}
