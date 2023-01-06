<?php

namespace App\Models;
//use App\Models\Post;
//use App\Models\User;
use App\Models\Comment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
 {
  use HasFactory;
  protected $fillable = ['user_id','title', 'category', 'content', 'image', 'slug'];

  public function comments()
  {
    return $this->hasMany(Comment::class, 'post_id', 'id');
  }
}