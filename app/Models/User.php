<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'gender',
        'phone',
        'image',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getImage(string $width, string $height)
    {
        if ($this->image) {
            return '<img src="' . asset('images/' . $this->image) . '" alt="user-avatar" class="img-responsive rounded shadow" width="' . $width . '" height="' . $height . '">';
        } else {
            return '<img src="' . asset('images/img-placeholder.jfif') . '" alt="user-avatar" class="img-responsive rounded shadow" width="' . $width . '" height="' . $height . '">';
        }
    }
}
