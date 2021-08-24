<?php

namespace App\Http\Controllers;

use App\Facades\UserFacade;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = UserFacade::index();

        return view("admin.users.users-list", compact('users'));
    }

    public function show(Request $request, $id)
    {

    }

    public function store()
    {

    }

    public function create(CreateUserRequest $request)
    {

    }

    public function destroy()
    {
        
    }
}
