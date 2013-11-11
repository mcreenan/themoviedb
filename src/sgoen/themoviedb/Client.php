<?php

namespace sgoen\themoviedb;

use sgoen\themoviedb\Configuration;
use sgoen\themoviedb\Movie;

class Client
{
	protected $_apiKey;
	protected $_apiBaseUrl;

	public function __construct($apiKey, $apiBaseUrl)
	{
		$this->_apiKey = $apiKey;
		$this->_apiBaseUrl = $apiBaseUrl;
	}

	public function getConfiguration()
	{
		$reponse = $this->_request("/configuration?api_key={$this->_apiKey}");
		$configuration = new Configuration($response);

		return $configuration;
	}

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
		foreach($response['results'] as $arr)
		{
			$results[] = new Movie($arr);
		}

		return $results;
	}

	protected function _request($uri)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "{$this->_apiBaseUrl}{$uri}");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));

		$response = curl_exec($ch);
		curl_close($ch);
var_dump($uri);var_dump($response);
		$decoded = json_decode($response, true);
		return $decoded;
	}
}
