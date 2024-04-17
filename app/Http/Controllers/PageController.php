<?php

namespace App\Http\Controllers;

use pagination;
use App\Models\Post;
use App\Models\User;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function about() {
        return view('about', [
            'title' => 'A propos',
            'content' => 'Lorem Ipsum'
        ]);
    }

    public function legal() {
        return view('legal');
    }

    public function index(Request $request) {
        $users = Auth::user();
        $categoriesSelect = Categorie::all();
        $categories = $request->categories;

        if ($categories !== null) {
            $posts = Post::whereHas('categories', function ($query) use ($categories) {
                $query->where('categories.id', $categories);
            })->get();
        } else {

            $posts = Post::all();
        }


        return view('welcome',[
            'posts' => $posts,
            'categories' => $categoriesSelect,
            'users' => $users
        ]);
    }

    public function showOne(Request $request){
        $post = Post::find($request->id);
        return view('showOne', ['post' => $post]);
    }

    public function deletePostWelcome(Request $request) {
        $post = Post::find($request->id);
        $post->delete();

        return redirect()->route('index')->with('success', 'Post supprimé avec succès !');
    }

}
