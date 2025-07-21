<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return response()->json(['user' => $request->user()]);
});

Route::get('/status', function () {
    return response()->json(['status' => 'OK!']);
});
