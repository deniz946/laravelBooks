<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'year', 'description', 'genre', 'author', 'img']; 

    protected $talbe = 'books';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre', 'genre_book');
    }

    public function scopeSearch($query, $search)
    {

        if($search != "")
        {	

        	return $query->where('title', 'like', '%'.$search. '%');
        }

    }

}

