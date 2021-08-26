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
        $user = UserFacade::show($request->all, $id);

        return view("admin.users.user-detail", compact($user));
    }

    public function store()
    {
        $users = UserFacade::index();

        return view("admin.users.user-create", compact('users'));
    }

    public function create(CreateUserRequest $request)
    {
        try {
            $user = UserFacade::create($request->all());

            return redirect()->route("users-list");
        }catch (\Throwable $th){
            return back()->withErrors([
                "message" => $th->getMessage(),
            ]);
        }
    }

    public function edit(Request $request, $id)
    {
        //todo
    }

    public function destroy(Request $request, $id)
    {
        try {
            UserFacade::delete($id);
            return redirect()->route("users-list");
        }catch (\Throwable $th){
            return back()->withErrors([
                "message" => $th->getMessage(),
            ]);
        }
    }
}
