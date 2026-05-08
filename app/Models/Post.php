<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $hidden = [
        'id'
    ];

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'text',
        'status',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }  
}
