<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'post_id'
    ];

    public function post() {
        return $this->belongsTo('App\Models\Post', 'post_id', 'id');
    }
}
