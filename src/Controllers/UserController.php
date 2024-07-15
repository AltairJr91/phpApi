<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\UserServices;

class UserController
{
    public function index(Request $request, Response $response)
    {
        $userService = UserServices::index();

        if ($userService['error']) {
            $response::json([
                'error' => true,
                'success' => false,
                'message' => $userService['error']
            ], 404);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => 'Users list',
            'data' => $userService
        ]);

    }

    public function store(Request $request, Response $response)
    {
    
        $body = $request::body();

        $userService = UserServices::create($body);
        if ($userService['error']) {
            $response::json([
                'error' => true,
                'success' => false,
                'message' => $userService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => 'User created',
            'data' => $userService
        ], 201);
    }

    public function show(Request $request, Response $response)
    {
        $userService = UserServices::show($request::param('id'));
        if ($userService['error']) {
            $response::json([
                'error' => true,
                'success' => false,
                'message' => $userService['error']
            ], 404);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => 'User found',
            'data' => $userService
        ]);
    }

    public function update(Request $request, Response $response)
    {
      $userService = UserServices::update($request::param('id'));
        if ($userService['error']) {
            $response::json([
                'error' => true,
                'success' => false,
                'message' => $userService['error']
            ], 404);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => 'User found',
            'data' => $userService
        ]);
    }

    public function destroy(Request $request, Response $response, array $id)
    {
        $userService = UserServices::delete($id[0]);
        if ($userService['error']) {
            $response::json([
                'error' => true,
                'success' => false,
                'message' => $userService['error']
            ], 404);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => 'User deleted',
            'data' => $userService
        ]);
    }
}