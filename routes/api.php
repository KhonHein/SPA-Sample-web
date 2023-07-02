<?php


use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\SubjectController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\DocumentController;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ClassNameController;

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




// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//jsut test not to product
//Route::post('check_token',[AuthController::class,'checkToken']);
//http://127.0.0.1:8000/api/check_token

Route::group(['middleware' => 'is_admin'],function (){

});

Route::post('/is_admin',[AuthController::class,'isAdmin']);
//http://127.0.0.1:8000/api/is_admin

Route::get('/all_users/{id}',[UserController::class,'getAllUsers']);
//http://127.0.0.1:8000/api/all_users/{id}

Route::get('/delete_user/{id}',[UserController::class,'deleteUser']);
//http://127.0.0.1:8000/api/delete_user/{id}

Route::get('/update_role/{id}/{r}',[UserController::class,'updateRole']);
//http://127.0.0.1:8000/api/update_role/{id}/{r}

Route::post('/register',[AuthController::class,'register']);
//http://127.0.0.1:8000/api/register

Route::post('/login',[AuthController::class,'login']);
//http://127.0.0.1:8000/api/login



Route::post('/create_class', [ClassNameController::class,'createClass']);
//http://127.0.0.1:8000/api/create_class

Route::get('/all_classes',[ClassNameController::class,'getAllClasses']);
//http://127.0.0.1:8000/api/all_classes

Route::post('/create_subject',[SubjectController::class,'createSubject']);
//http://127.0.0.1:8000/api/create_subject

Route::get('/all_subjects',[SubjectController::class,'getSubject']);
//http://127.0.0.1:8000/api/all_subjects

Route::post('/create_post',[PostController::class,'createPost']);
//http://127.0.0.1:8000/api/create_post

Route::get('/all_posts',[PostController::class,'getPost']);
//http://127.0.0.1:8000/api/all_posts

Route::post('/add_doc',[DocumentController::class,'createDoc']);
//http://127.0.0.1:8000/api/add_doc

Route::get('/all_doc',[DocumentController::class,'getDoc']);
//http://127.0.0.1:8000/api/all_doc


