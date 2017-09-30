<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function getAll()
    {
        return \App\Movie::all()->load('genre');
    }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function getById($id)
    {
        return \App\Movie::findOrFail($id)->load('genre');
    }

    /**
     * Update the given user.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $movie = \App\Movie::findOrFail($id);
        $movie->fill($request->all());
        $movie->save();
        return $movie;
    }

    /**
     * Update the given user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request)
    {
        $genre = \App\Genre::findOrFail($request->all()['genre_id']);
        $movie = new \App\Movie;
        $movie->fill($request->all());
        $movie->genre()->associate($genre);
        $movie->save();
        return $movie;
    }
}