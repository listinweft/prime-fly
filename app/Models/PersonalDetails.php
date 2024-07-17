<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDetails extends Model
{
    use HasFactory;

    protected $table = 'personal_details';
    protected $fillable = [
        'order_id',
        'name',
        'age',
        'address',
        'passport_number',
        // Add other fillable fields
    ];

    // Define relationships if needed
}
