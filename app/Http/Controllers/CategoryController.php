<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function categories(Request $request) {
        $categoriesSelect = Categorie::all();
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
        $categorie = Categorie::where('id', $request->id);
        $categorie->delete();

        return redirect()->route('categories')->with('success', 'Post supprimé avec succès !');
    }


    public function formCategories() {
        return view('categoriesForm');
    }


    public function addCategorie(Request $request) {
        $categorie = new Categorie;
        $categorie->title = $request->title;
        $categorie->description = $request->description;
        $categorie->picture =  $request->picture;
        $categorie->save();

        return redirect()->route('categories')->with('success', 'Post supprimé avec succès !');
    }
}
