<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\ColorsServices; 

class ColorController
{
    public function index(Request $request, Response $response)
    {
        $colorService = ColorsServices::all();

        if ($colorService['error']) {
            $response::json([
                'error' => true,
                'success' => false,
                'message' => $colorService['error']
            ], 404);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => 'Colors list',
            'data' => $colorService
        ]);
    }

    public function store(Request $request, Response $response)
    {
        $body = $request::body();

        $colorService = ColorsServices::create($body);
        if ($colorService['error']) {
            $response::json([
                'error' => true,
                'success' => false,
                'message' => $colorService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => 'Color created',
            'data' => $colorService
        ], 201);
    }

    public function show(Request $request, Response $response)
    {
        $colorService = ColorsServices::find($request::param('id'));
        if ($colorService['error']) {
            $response::json([
                'error' => true,
                'success' => false,
                'message' => $colorService['error']
            ], 404);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => 'Color found',
            'data' => $colorService
        ]);
    }

    public function update(Request $request, Response $response)
    {
        $body = $request::body();

        $colorService = ColorsServices::update($request::param('id'), $body);
        if ($colorService['error']) {
            $response::json([
                'error' => true,
                'success' => false,
                'message' => $colorService['error']
            ], 400);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => 'Color updated',
            'data' => $colorService
        ]);
    }

    public function destroy(Request $request, Response $response)
    {
        $colorService = ColorsServices::delete($request::param('id'));
        if ($colorService['error']) {
            $response::json([
                'error' => true,
                'success' => false,
                'message' => $colorService['error']
            ], 404);
        }

        $response::json([
            'error' => false,
            'success' => true,
            'message' => 'Color deleted',
            'data' => $colorService
        ]);
    }
}