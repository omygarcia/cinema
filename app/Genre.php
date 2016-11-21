<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = "tb_genres";
    protected $primaryKey = "id_genre";
    protected $fillable = ["genre"];
}
