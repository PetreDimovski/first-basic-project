<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //protected $table = 'posts'; -> Daca vrem sa conectam modelul cu alta DB

    //protected $primaryKey = 'title'; -> daca vrem sa facem alta coloana sa fie Primary Key

    //protected $timestamps = false; -> turning timestams off

   //protected $dateTime = 'U'; ->data la care a fost salvata informatia
}
