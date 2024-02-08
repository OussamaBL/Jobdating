<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Http\Requests\UserRequest;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }
    public function profile(){
        $announcements=Auth::user()->announcements()->get();
        return view('users.profile',compact('announcements'));
    }
    public function update(UserRequest $userRequest,$param){
        $user=Auth::user();
        $user->name=$userRequest->name;
        $user->email=$userRequest->email;
        $user->adress=$userRequest->adress;
        $user->save();
        return redirect()->route('users.profile')->with("success","Informations updated successfully");

    }
    
}
