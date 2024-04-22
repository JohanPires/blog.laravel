<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function usersList(){

        $users = User::all();



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
        $posts = Post::all()->where('author',$request->id);
        $users->delete();

        foreach($posts as $post){
            $post->categories()->detach();
            $post->delete();

        }
        // dd($test);
        // Post::all()->where('author', $request->id)->categories()->detach();

        return redirect()->route('usersList')->with('users', 'Post editer avec succès !');
    }
}
