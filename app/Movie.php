<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Movie extends Model
{
	use SoftDeletes;

    protected $table = "tb_movie";
    protected $primaryKey = "id_movie";
    protected $fillable = ["name","cast","duration","imagen","id_genre"];
    protected $dates = ["deleted_at"];
}
