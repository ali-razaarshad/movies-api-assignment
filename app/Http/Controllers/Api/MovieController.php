<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovieRequest;
use App\Models\Movie;

class MovieController extends Controller
{

    /**
     * Get All the movies
     * @return \Illuminate\Http\JsonResponse
     *
    */
    public function index()
    {
        $movies = Movie::all();

        return response()->json(['movies' => $movies]);
    }

    /**
     * Get single movie detail by id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function show($id)
    {
        $movie = Movie::where('id', '=', $id)->first();
        return response()->json(['movie' => $movie]);
    }

    /**
     * Store the movie details
     * @param StoreMovieRequest $request
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function store(StoreMovieRequest $request)
    {
        $validatedData = $request->validated();

        $movie = new Movie();
        $movie->name = $validatedData['name'];
        $movie->casts = $validatedData['casts'];
        $movie->release_date = date('Y-m-d', strtotime($validatedData['release_date']));
        $movie->director = $validatedData['director'];
        $movie->ratings = json_encode($validatedData['ratings']);
        $movie->save();

        return response()->json(['message' => 'Movie stored successfully'], 201);
    }

}
