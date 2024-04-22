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
        $allUsers = User::all();




        return view('welcome',[
            'categories' => $categoriesSelect,
            'users' => $users,
            'allUsers' => $allUsers
        ]);
    }
    public function filter(Request $request) {
        $users = Auth::user();
        $categoriesSelect = Categorie::all();
        $allUsers = User::all();
        $categories = explode(',', $request->categories);
        $postsQuery =  Post::query();
         if ($categories !== null) {
            if ($categories[0] === 'all' or $categories[0] === ''){
                $posts = Post::latest()->paginate(8);
            } else {

                foreach($categories as $categorie){

                    $postsQuery->orWhereHas('categories', function ($query) use ($categorie) {
                        $query->where('categories.id', $categorie);
                    });
                }
                $posts = $postsQuery->latest()->paginate(8);
            }
        } else {

            $posts = Post::latest()->paginate(8);
        }


        return view('allPosts',[
            'posts' => $posts,
            'categories' => $categoriesSelect,
            'users' => $users,
            'allUsers' => $allUsers
        ]);
    }



    public function showOne(Request $request){

        $post = Post::find($request->id);
        $user = User::find($post->author);

        // dd($user);
        return view('showOne', ['post' => $post, 'user' => $user]);
    }

    public function deletePostWelcome(Request $request) {
        $post = Post::find($request->id);
        $post->delete();

        return redirect()->route('index')->with('success', 'Post supprimé avec succès !');
    }

}
