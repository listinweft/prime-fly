<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'likes', 'user_id','blog_id','journal_id'];


    public function commentable()
{
    return $this->morphTo();
}

public function user()
{
    return $this->belongsTo(User::class);
}

public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    public function blog()
{
    return $this->belongsTo(Blog::class, 'blog_id', 'id');
}
public function journal()
{
    return $this->belongsTo(Journal::class, 'journal_id', 'id');
}

}
