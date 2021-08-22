<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests\CreateTeamRequest;
use App\Http\Requests\UpdateProfileRequest;

use App\Models\Team;

class CRMController extends Controller
{
    public function index()
    {
        $teams = Team::all();

        return view("admin.dashboard", [
            "teams" => $teams,
        ]);
    }

    public function listUsersType()
    {
        $user_roles = [];

        return view("admin.users-type", compact('user_roles'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view("admin.profile", compact('user'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = Auth::user();

        if($request->email){
            $user->email = $request->email;
        }

        if($request->name){
            $user->name = $request->name;
        }

        if($request->password){
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route("profile");
    }

    public function teamsList()
    {
        $teams = Team::paginate();

        return view("admin.teams-list", compact("teams"));
    }

    public function createTeamForm()
    {
        return view("admin.create-team-form");
    }
    public function createTeam(CreateTeamRequest $request)
    {
        try {
            DB::beginTransaction();

            $team = new Team();

            $team->name = $request->name;
            $team->display_name = $request->display_name;
            $team->description = $request->description;

            $team->save();

            DB::commit();

            return redirect()->route("teams-list");
        }catch(\Throwable $th){
            DB::rollback();
            Log::error($th);

            return back()->withErrors([
                "message" => $th->getMessage()
            ]);
        }
    }

    public function teamDetail(Request $request, $id)
    {
        $team = Team::findOrFail($id);

        $users = $team->users()->with('roles')->paginate();

        return view("admin.team-detail", [
            "users" => $users,
            "team" => $team,
        ]);
    }

}
