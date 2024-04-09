<?php

namespace App\Http\Controllers;

use pagination;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function categories() {
        return view('categories');
    }

    public function index(Request $request) {
        $categories = $request->query('categories');

        if ($categories !== null) {
            $posts = Post::where('categories', $categories)->get();
        } else {

            $posts = Post::all();
        }


        return view('welcome', [
            'posts' => $posts,
        ]);
    }
}
