<?php

use App\Models\VisitLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/detect', function (Request $request) {
    $data = $request->validate([
        'user_id' => 'required',
        'mood' => 'required',
        'material_id' => 'required',
        'expressions' => 'required', 
    ]); 

    VisitLog::create($data);

    return ['message' => 'ok']; 
}); 
