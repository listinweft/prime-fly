<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLocation extends Model
{
    use HasFactory;

    protected $table = 'users_location';
    protected $fillable = ['user_id', 'location_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}