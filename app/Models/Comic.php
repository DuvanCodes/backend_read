<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
    */
    protected $fillable = [
        'name', 'filename', 'author', 'Description', 'status', 'scan', 'url'
    ];

    public function names_categories($ids){

        return $this->select('categories.name_category')->join('categorie_comics', 'comics.id', 'categorie_comics.comic_id')->join('categories', 'categorie_comics.categorie_id', 'categories.id')
                        ->where('comics.id', $ids)->get();

        return $names;
    }
}
