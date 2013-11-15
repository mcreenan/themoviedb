<?php

namespace sgoen\themoviedb;

use sgoen\themoviedb\AbstractService;
use sgoen\themoviedb\Movie;

class MovieService extends AbstractService
{
    public function getMovieById($id)
    {
        $response = $this->_request("/movie/{$id}?api_key={$this->_apiKey}");
        $movie = new Movie($response);

        return $movie;
    }

    public function searchMovie($query)
    {
        $query = urlencode($query);
        $response = $this->_request("/search/movie?api_key={$this->_apiKey}&query={$query}");

        $results = array();
        foreach ($response['results'] as $arr) {
            $results[] = new Movie($arr);
        }

        return $results;
    }
}
