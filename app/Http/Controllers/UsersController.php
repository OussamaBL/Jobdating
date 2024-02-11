<?php

namespace App\Http\Controllers;

use App\Models\User_Skill;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Http\Requests\UserRequest;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\Skill;
class UsersController extends Controller
{
    
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }
    public function profile(){
        $announcements=Auth::user()->announcements()->get();
        $skills = Skill::all();
        return view('users.profile',compact('announcements','skills'));
    }
    public function update(UserRequest $userRequest,$param){
        $user=Auth::user();
        $user->name=$userRequest->name;
        $user->email=$userRequest->email;
        $user->adress=$userRequest->adress;

        Auth::user()->skills()->detach();
        // if(count($userRequest->skills)>0){
        if($userRequest->skills!=null){
            foreach($userRequest->skills as $skill){
                User_Skill::create([
                    'user_id' => Auth::id(),
                    'skill_id' => $skill,
                ]);
            }
        }
        $user->save();
        return redirect()->route('users.profile')->with("success","Informations updated successfully");

    }
    
}
