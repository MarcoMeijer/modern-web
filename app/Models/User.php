<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

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

    protected static function booted()
    {
        static::created(function ($user) {
            Profile::create([
                'user_id' => $user->id,
            ]);
        });
        static::deleting(function ($user) {
            $user->profile->delete();
            foreach ($user->messages as $message) {
                $message->delete();
            }
        });
    }

    public function isAdmin()
    {
        return $this->authorization === 'admin';
    }

    public function isModerator()
    {
        return $this->authorization === 'moderator' || $this->authorization === 'admin';
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'author_id');
    }
}
