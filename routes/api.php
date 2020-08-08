<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('user','User\UserController');

Route::apiResource('area','Area\AreaController');

Route::apiResource('department','Department\DepartmentController');

Route::apiResource('institution','Institution\InstitutionController');

Route::apiResource('levelemployee','LevelEmployee\LevelEmployeeController');

Route::apiResource('position','Position\PositionController');

Route::apiResource('stationed','Stationed\StationedController');

Route::apiResource('province','Prov_Dist_Village\ProvinceController');

Route::apiResource('district','Prov_Dist_Village\DistrictController');

Route::apiResource('village','Prov_Dist_Village\VillageController');

