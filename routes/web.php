<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskStatusController;
use App\Http\Controllers\UserController;
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

Route::get("admin", function (){
   return redirect()->route("dashboard");
});

Route::prefix("admin")->group(function(){
    Route::get("login", [AdminAuth::class, "loginView"])->name("login-form");
    Route::post("login", [AdminAuth::class, "login"])->name("login");
    Route::post("logout", [AdminAuth::class, "logout"])->name("logout-user");

    Route::group([
        "middleware" => "auth"
    ], function(){
        Route::get("dashboard", [CRMController::class, "index"])->name("dashboard");
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

            Route::get("detail/{id}", [TaskController::class, "show"])->name("task-detail");
            Route::get("update/{id}", [TaskController::class, "edit"])->name("task-edit");
            Route::post("update/{id}", [TaskController::class, "update"])->name("task-update");
            Route::post("delete/{id}", [TaskController::class, "destroy"])->name("task-delete");
        });

        Route::group([
            "prefix" => "task-statuses"
        ], function(){
            Route::get("", [TaskStatusController::class, "index"])->name("task-statuses-list");
            Route::get("detail/{id}", [TaskStatusController::class, "show"])->name("task-status-detail");
            Route::get("update/{id}", [TaskStatusController::class, "edit"])->name("task-status-update-form");
            Route::post("update/{id}", [TaskStatusController::class, "update"])->name("task-status-update");
            Route::get("create", [TaskStatusController::class, "create"])->name("task-status-create");
            Route::post("create", [TaskStatusController::class, "store"])->name("task-status-store");
        });

        Route::group([
            "prefix" => "users"
        ], function(){
            Route::get("", [UserController::class, "index"])->name("users-list");
            Route::get("detail/{id}", [UserController::class, "index"])->name("users-detail");
            Route::get("create",[UserController::class, "store"])->name("users-store");
            Route::post("create",[UserController::class, "create"])->name("users-create");
        });
    });
});
