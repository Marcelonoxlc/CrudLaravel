<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Categoria extends Model
{
    use HasFactory;

    //Relacion uno a muchos
        //Relacion uno a muchos
        public function posts(){
            return $this->hasMany((Post::class));
        }
}
