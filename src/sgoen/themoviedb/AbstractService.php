<?php

namespace sgoen\themoviedb;

use sgoen\themoviedb\CurlException;
use sgoen\themoviedb\JSONDecodeException;

/**
 * Contains a set of functions which are mandatory for every service in order to
 * actually perform API requests.
 * The apiKey and apiBaseUrl can be obtained at 'http://docs.themoviedb.apiary.io'
 */
abstract class AbstractService
{
	protected $_apiKey;
	protected $_apiBaseUrl;

	/**
	 * @param string $apiKey
	 * @param string $apiBaseUrl
	 */
	public function __construct($apiKey, $apiBaseUrl)
	{
		$this->_apiKey = $apiKey;
		$this->_apiBaseUrl = $apiBaseUrl;
	}
	
	/**
	 * Request the given url and return the decoded result. Throws an exception if one
	 * of the steps fails.
	 *
	 * @param  string $url The url which should be requested
	 * @return array       The result as array
	 * @throws CurlException          When the request through curl fails.
	 * @throws JSONDecodeException    When the reponse can't be decoded.
	 * @throws TheMovieDbAPIException When the api response contains an error message.
	 */
	protected function _request($uri)
	{
		$url = "{$this->_apiBaseUrl}{$uri}";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));

		$response = curl_exec($ch);
		if($response === false)
		{
			throw new CurlException("Unable to complete curl request for url: '{$url}'");
		}

		curl_close($ch);
		$decoded = json_decode($response, true);
		if($decoded === null)
		{
			throw new JSONDecodeException();
		}	
		
		if(isset($decoded['status_code']))
		{
			throw new TheMovieDbAPIException($decoded['status_message'], $decoded['status_code']);
		}

		return $decoded;
	}
}
