<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomNotification extends Model
{
    use HasFactory;

    protected $table = 'custom_notifications';

    protected $fillable = ['user_id', 'message', 'status', 'notification_status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }
} 