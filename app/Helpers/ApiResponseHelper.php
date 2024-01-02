<?php

namespace App\Helpers;

use Symfony\Component\Console\Helper\Helper;

class ApiResponseHelper
{
    public static function success($code, $message, $data)
    {
        return response()->json([
            "code" => $code,
            "success" => true,
            "message" => $message,
            "data" => $data,
        ], $code);
    }

    public static function error($code, $message, $data = null)
    {
        return response()->json([
            "code" => $code,
            "success" => false,
            "message" => $message,
            "data" => $data,
        ], $code);
    }
}
