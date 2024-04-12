<?php

namespace App\Models;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'picture',
        'categories',
        'author',
    ];
    public function categories()
    {
        return $this->belongsToMany(Categorie::class);
    }
}
