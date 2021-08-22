<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuth;
use App\Http\Controllers\CRMController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('main-page');

Route::prefix("admin")->group(function(){
    Route::get("login", [AdminAuth::class, "loginView"])->name("login-form");
    Route::post("login", [AdminAuth::class, "login"])->name("login");
    Route::post("logout", [AdminAuth::class, "logout"])->name("logout-user");

    Route::group([
        "middleware" => "auth"
    ], function(){
        Route::get("dashboard", [CRMController::class, "index"])->name("dashboard");
        Route::get("users", [CRMController::class, "listUsersType"])->name("list-users");
        Route::get("profile", [CRMController::class, "profile"])->name("profile");
        Route::post("profile", [CRMController::class, "updateProfile"])->name("updateProfile");

        Route::group([
            "prefix" => "teams"
        ], function(){
            Route::get("", [CRMController::class, "teamsList"])->name("teams-list");
            Route::get("/detail/{id}", [CRMController::class, "teamDetail"])->name("team-detail");
            Route::get("create", [CRMController::class, "createTeamForm"])->name("create-team-form");
            Route::post("create", [CRMController::class, "createTeam"])->name("create-team");

            Route::get("/update/{id}", [CRMController::class, "teamUpdateForm"])->name("team-update-form");
            Route::post("/update/{id}", [CRMController::class, "teamUpdate"])->name("team-update");
        });

        Route::group([
            "prefix" => "tasks"
        ], function(){
            Route::get("", [TaskController::class, "index"])->name("tasks-list");

            Route::get("create", [TaskController::class, "create"])->name("tasks-create");
            Route::post("create", [TaskController::class, "store"])->name("tasks-store");

            Route::get("detail/{id}", [TaskController::class, "show"]);
            Route::get("update/{id}", [TaskController::class, "edit"]);
            Route::post("update/{id}", [TaskController::class, "update"]);
            Route::post("delete/{id}", [TaskController::class, "destroy"]);
        });
    });
});
