<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function usersList(){
        $users = User::all();

        if (Auth::user()->role === null) {
            return redirect()->route('dashboard')->with('success', 'Post supprimé avec succès !');
        }


        return view('users', ['users' => $users]);
    }

    public function changeRole(Request $request){

        $users = User::find($request->id);
        $users->role = $request->input('role');
        $users->save();

        return redirect()->route('usersList')->with('users', 'Post editer avec succès !');
    }
    public function deleteUser(Request $request){

        $users = User::find($request->id);
        $users->delete();

        return redirect()->route('usersList')->with('users', 'Post editer avec succès !');
    }
}
