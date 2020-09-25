<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['title', 'summary', 'thoughts', 'book_image', 'rate'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function like_users()
    {
        return $this->belongsToMany('App\User');
    }
}
