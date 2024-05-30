<?php

namespace App\Controller;

class ApiOutputFormatter
{
    static public function message(string $message = 'error')
    {
        return [
            'message' => $message,
        ];
    }
}