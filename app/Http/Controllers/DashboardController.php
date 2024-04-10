<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class DashboardController extends Controller
{

    public function getAll(){

        $posts = Post::all();

        return view('dashboard', [
            'posts' => $posts,

        ]);
    }
    public function myPost(){

        $posts = Post::all();
        // dump($posts);

        return view('myPost', [
            'posts' => $posts,

        ]);
    }
    public function formPost(Request $request){
        $categories = Categories::all();
        if ($request->id) {
            $post = Post::find($request->id);
        } else {
            $post = null;
        }


        return view('addForm',['post' => $post, 'categories' => $categories]);

    }
    public function addPost(Request $request){
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->picture =  $request->picture;
        $post->author = Auth::user()->name;
        $post->categories = $request->categories;
        $post->save();


        return redirect()->route('dashboard')->with('success', 'Post ajouté avec succès !');
    }

    public function delete(Request $request) {
        $post = Post::find($request->id);
        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Post supprimé avec succès !');
    }

    public function edit(Request $request) {
        $post = Post::find($request->post);
        $post->title = $request->title;
        $post->description = $request->description;
        if ($request->picture !== null) {
            $post->picture = $request->picture;
        }else {
            $post->picture = $post->picture;
        }
        $post->author = Auth::user()->name;
        $post->categories = $request->categories;
        $post->save();

        return redirect()->route('dashboard')->with('success', 'Post supprimé avec succès !');
    }
}
