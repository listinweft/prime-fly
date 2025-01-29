<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileApp extends Model
{
    use HasFactory;

    protected $table = 'mobile_apps'; // Define table name if needed


    protected $fillable = [
        'type',
        'ios',
        'android',
        'version_date',
    ];

    protected $casts = [
        'version_date' => 'datetime',
    ];
}
