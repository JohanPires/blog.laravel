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
        //     $posts = Post::with('categories')->get();
        // } else {

        //     $posts = Post::all();
        // }


        return view('welcome',[
            'posts' => $posts,
            'categories' => $categoriesSelect]);
    }





}
