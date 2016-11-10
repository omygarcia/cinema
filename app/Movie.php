<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = "tb_movie";
    protected $primaryKey = "id_movie";
    //protected $fillable = ["name"];
}
