<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPost extends Model
{
protected $fillable = ['doc_name'];
    use HasFactory;
    protected $table = 'customerposts';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
