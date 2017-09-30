<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class GenreController extends Controller
{

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function getAll()
    {
        return \App\Genre::all()->load('movies');
    }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function getById($id)
    {
        return \App\Genre::findOrFail($id)->load('movies');
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
        $genre = \App\Genre::findOrFail($id);
        $genre->fill($request->all());
        $genre->save();
        return $genre;
    }

    /**
     * Update the given user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(Request $request)
    {
        $genre = new \App\Genre;
        $genre->fill($request->all());
        $genre->save();
        return $genre;
    }
}