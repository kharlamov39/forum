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
        'name',
        'email',
        'password',
        'role_id',
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

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isAdmin()
    {
        return $this->role_id === 1;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (User::count() == 0) {
                // Первый пользователь получает роль администратора
                $user->role_id = 1;
            } else {
                // Все остальные пользователи получают роль обычного пользователя
                $user->role_id = 2;
            }
        });

        static::creating(function ($user) {
            // Создание записи в таблице profiles для нового пользователя

            dd($user);
            $user->profile()->create([
                'user_id' => $user->id
            ]);
        });
    }
}
