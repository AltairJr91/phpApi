<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;


class NotFoundRoute
{
    public function index(Request $request, Response $response)
    {
        $response::json([
            'error' => true,
            'success' => false,
            'message' => 'Route not found'
        ], 404);
        return;
    }
}
