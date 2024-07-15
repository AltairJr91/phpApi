<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\ColorsUsersServices;

class colorsUsersController
{
    public function index(Request $request, Response $response)
    {
        $colorUserService = ColorsUsersServices::all();

        if ($colorUserService['error']) {
            $response::json([
                'error' => true,
                'success' => false,
                'message' => $colorUserService['error']
            ], 404);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => 'ColorsUsers list',
            'data' => $colorUserService
        ]);
    }

    public function store(Request $request, Response $response)
    {
        $body = $request::body();

        $colorUserService = ColorsUsersServices::create($body);
        if ($colorUserService['error']) {
            $response::json([
                'error' => true,
                'success' => false,
                'message' => $colorUserService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => 'ColorUser created',
            'data' => $colorUserService
        ], 201);
    }

    public function show(Request $request, Response $response)
    {
        $colorUserService = ColorsUsersServices::find($request::param('id'));
        if ($colorUserService['error']) {
            $response::json([
                'error' => true,
                'success' => false,
                'message' => $colorUserService['error']
            ], 404);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => 'ColorUser found',
            'data' => $colorUserService
        ]);
    }

    public function update(Request $request, Response $response)
    {
        $body = $request::body();

        $colorUserService = ColorsUsersServices::update($request::param('id'), $body);
        if ($colorUserService['error']) {
            $response::json([
                'error' => true,
                'success' => false,
                'message' => $colorUserService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => 'ColorUser updated',
            'data' => $colorUserService
        ]);
    }

    public function destroy(Request $request, Response $response)
    {
        $colorUserService = ColorsUsersServices::delete($request::param('id'));
        if ($colorUserService['error']) {
            $response::json([
                'error' => true,
                'success' => false,
                'message' => $colorUserService['error']
            ], 404);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => 'ColorUser deleted',
            'data' => $colorUserService
        ]);
    }
}