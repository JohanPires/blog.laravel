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
        $posts = Post::where( 'author', Auth::user()->id )->get();
        // dd($posts);

        return view('myPost', [
            'posts' => $posts,

        ]);
    }
    public function formPost(Request $request){


        $categories = Categorie::all();
        if ($request->id) {
            $postCategories = Post::find($request->id)->categories()->get();
            $posts = Post::where('id',$request->id)->get();
            $post = $posts[0];
        } else {
            $post = null;
            $postCategories = null;
        }


        return view('addForm',['post' => $post, 'categories' => $categories, 'postCategories' => $postCategories]);

    }
    public function addPost(Request $request){


        // $request->validate([
        //     'title' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'picture' => 'required',
        //     'description' => 'required',
        //     'author' => 'required',
        // ]);

        $image = $request->file('picture');

        $imageName = time().'.'.$image->getClientOriginalExtension();

        $image->move(public_path('images'), $imageName);


        $file =$request->file('picture');



        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->picture =  $imageName;
        $post->author = Auth::user()->id;
        $post->save();

        $allCategories = $request->categories;
        foreach($allCategories as $categorie ){

            $post->categories()->attach($categorie);
        }

        return redirect()->route('dashboard')->with('success', 'Post ajouté avec succès !');
    }

    public function delete(Request $request) {
        $post = Post::find($request->id);
        Post::find($request->id)->categories()->detach();
        $post->delete();



        return redirect()->route('dashboard')->with('success', 'Post supprimé avec succès !');
    }

    public function edit(Request $request) {


        // $request->validate([
        //     'title' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'picture' => 'required',
        //     'description' => 'required',
        //     'author' => 'required',
        // ]);


        $post = Post::find($request->post);
        $post->title = $request->title;
        $post->description = $request->description;
        if ($request->picture !== null) {
            $image = $request->file('picture');

            $imageName = time().'.'.$image->getClientOriginalExtension();

            $image->move(public_path('images'), $imageName);


            $file =$request->file('picture');
            $post->picture = $imageName;
        }else {
            $post->picture = $post->picture;
        }
        $post->author = Auth::user()->id;
        Post::find($request->post)->categories()->sync($request->categories);
        $post->save();





        return redirect()->route('dashboard')->with('success', 'Post supprimé avec succès !');
    }
}
