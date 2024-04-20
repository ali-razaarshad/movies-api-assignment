<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovieApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test to hit the GET /api/v1/movies endpoint.
     *
     * @return void
     */
    public function testGetMoviesEndpoint()
    {
        $response = $this->get('/api/v1/movies');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => [
                'name',
                'casts',
                'release_date',
                'director',
                'ratings',
            ],
        ]);
    }

    /**
     * Test to hit the POST /api/v1/movies endpoint with valid data.
     *
     * @return void
     */
    public function testCreateMovieEndpoint()
    {
        $movieData = [
            'name' => 'The Titanic',
            'casts' => ['DiCaprio', 'Kate Winslet'],
            'release_date' => '1998-01-18',
            'director' => 'James Cameron',
            'ratings' => [
                'imdb' => 7.8,
                'rotten_tomatto' => 8.2,
            ],
        ];

        $response = $this->json('POST', '/api/v1/movies', $movieData);

        $response->assertStatus(201);
        $response->assertJson(['message' => 'Movie stored successfully']);
    }
}
