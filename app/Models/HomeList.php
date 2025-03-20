<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeList extends Model
{
    use HasFactory;

    
    protected $table = 'home_list';

    protected $fillable = [
        'banner_title',
        'title',
        'description',
        'year_of_active',
        'number_of_customers',
    ];
}
