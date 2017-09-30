<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'genre';

    protected $fillable = ['name', 'description', 'image'];

    public $timestamps = false;

    /**
     * Get the movies for the genre.
     */
    public function movies()
    {
        return $this->hasMany('App\Movie');
    }
}