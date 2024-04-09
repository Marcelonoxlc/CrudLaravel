<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Atribute;
use App\Models\Profile;
use App\Models\Post;
use App\Models\Role;
use App\Models\Image;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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

    //Relacion uno a uno
    public function profile(){
        return $this->hasOne(Profile::class);
    }

    //Relacion uno a muchos
    public function posts(){
        return $this->hasMany((Post::class));
    }

    //Relacion muchos a muchos

    public function roles(){
        return $this->belongsToMany((Role::class));
    }

    //Relacion uno a uno polimorfica

    public function imagen(){
        return $this->morphOne(Image::class,'imageable');
    }

}
