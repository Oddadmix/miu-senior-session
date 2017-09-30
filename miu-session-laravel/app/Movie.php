<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'movie';

    protected $fillable = ['name', 'description', 'image'];

    public $timestamps = false;

    /**
     * Get the genre.
     */
    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }

}