<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Categorie;
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

        $posts = Post::where( 'author', Auth::user()->name )->get();

        return view('myPost', [
            'posts' => $posts,

        ]);
    }
    public function formPost(Request $request){
        $categories = Categorie::all();
        if ($request->id) {
            $post = Post::find($request->id);
        } else {
            $post = null;
        }


        return view('addForm',['post' => $post, 'categories' => $categories]);

    }
    public function addPost(Request $request){

        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Taille maximale de 2 Mo
        ]);

        $image = $request->file('picture');

        $imageName = time().'.'.$image->getClientOriginalExtension();

        $image->move(public_path('images'), $imageName);


        $file =$request->file('picture');



        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->picture =  $imageName;
        $post->author = Auth::user()->name;
        $post->categories = $request->categories;
        $post->save();

        $post->categories()->attach($post->id);

        // $post->categories()->sync([1, 2, 3]);


        return redirect()->route('dashboard')->with('success', 'Post ajouté avec succès !');
    }

    public function delete(Request $request) {
        $post = Post::find($request->id);
        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Post supprimé avec succès !');
    }

    public function edit(Request $request) {
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Taille maximale de 2 Mo
        ]);

        $image = $request->file('picture');

        $imageName = time().'.'.$image->getClientOriginalExtension();

        $image->move(public_path('images'), $imageName);


        $file =$request->file('picture');

        $post = Post::find($request->post);
        $post->title = $request->title;
        $post->description = $request->description;
        if ($request->picture !== null) {
            $post->picture = $imageName;
        }else {
            $post->picture = $post->picture;
        }
        $post->author = Auth::user()->name;
        $post->categories = $request->categories;
        $post->save();

        return redirect()->route('dashboard')->with('success', 'Post supprimé avec succès !');
    }
}
