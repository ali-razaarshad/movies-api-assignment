
## About Assignment
This assignment is designed in Laravel framework and MongoDB database used in it. The task is to create a minimal web application to develop and explore some REST endpoints
for end-users to consume.

### Created the following functional APIs endpoints

- Post /api/v1/movies
- GET /api/v1/movies/{id}
- GET /api/v1/movies

These APIs code is located in `App\Http\Controllers\Api\MovieController::class` and Create Movie Request Fields are validated in the `StoreMovieRequest::class`.
Basic authentication has been implemented using the `session_token` stored against the user in the users tables. APIs are authenticated using the `AuthenticateWithSessionToken::class` middleware.

Also, Write a Unit Test `MovieApiTest::class`. This Unit Test demonstrates tests for two API endpoints: GET /api/v1/movies to retrieve movies and POST /api/v1/movies to create a new movie.
