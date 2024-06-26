<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use App\Models\User;

class Reply extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $fillable = ['user_id', 'comment_id', 'body'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
