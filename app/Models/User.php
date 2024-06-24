<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'username', 'password','location_ids','btype'
    ];


    public $timestamps = true;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Scope a query to only include active items.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    /**
     * Scope a query to only include given type.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeType($query, $type)
    {
        return $query->where('user_type', $type);
    }


    /**
     * relationships with Admin model
     * an admin is a user
     */
    public function admin()
    {
        return $this->hasOne(Admin::class, 'user_id', 'id');
    }

    /**
     * relationships with Customer model
     * a customer is a user
     */
    public function customer()
    {
        return $this->hasOne(Customer::class, 'user_id', 'id');
    }
            public function comments()
        {
            return $this->hasMany(Comment::class);
        }

        public function hasLikedComment($comment)
        {
            return $this->likedComments()->where('comment_id', $comment->id)->exists();
        }
    
        /**
         * Define the relationship between User and liked comments.
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
         */
        public function likedComments()
        {
            return $this->belongsToMany(Comment::class, 'user_comment_likes', 'user_id', 'comment_id');
        }

        public function locations()
        {
            return $this->belongsToMany(Location::class, 'users_location', 'user_id', 'location_id');
        }

    
}
