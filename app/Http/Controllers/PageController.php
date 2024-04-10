<?php

namespace App\Http\Controllers;

use pagination;
use App\Models\Post;
use App\Models\User;
use App\Models\Categories;
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
        // $users = Auth::user()->name;
        // dump($users);
        return view('legal');
    }

    public function index(Request $request) {
        $categoriesSelect = Categories::all();
        $categories = $request->categories;

        if ($categories !== null) {
            $posts = Post::where('categories', $categories)->get();
        } else {

            $posts = Post::all();
        }
        // if ($categories !== null) {
        //     $posts = Post::with($categories)->get();
        // } else {

        //     $posts = Post::all();
        // }


        return view('welcome',[
            'posts' => $posts,
            'categories' => $categoriesSelect]);
    }

    public function categories(Request $request) {
        $categoriesSelect = Categories::all();
        $categories = $request->query('categories');

        if ($categories !== null) {
            $posts = Post::where('categories', $categories)->get();
        } else {

            $posts = Post::all();
        }

        if (Auth::user()->role === null) {
            return redirect()->route('dashboard')->with('success', 'Post supprimé avec succès !');
        }


        return view('categories', [
            'posts' => $posts,
            'categories' => $categoriesSelect
        ]);
    }
    public function deleteCategorie(Request $request) {
        $categorie = Categories::where('id', $request->id);
        $categorie->delete();

        return redirect()->route('categories')->with('success', 'Post supprimé avec succès !');
    }

    public function formCategories() {
        return view('categoriesForm');
    }

    public function addCategorie(Request $request) {
        $categorie = new Categories;
        $categorie->title = $request->title;
        $categorie->description = $request->description;
        $categorie->picture =  $request->picture;
        $categorie->save();

        return redirect()->route('categories')->with('success', 'Post supprimé avec succès !');
    }


    public function usersList(){
        $users = User::all();

        return view('users', ['users' => $users]);
    }
}
