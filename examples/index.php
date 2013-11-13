<?php

require_once dirname(__FILE__) . '/../src/sgoen/themoviedb/AbstractService.php';
require_once dirname(__FILE__) . '/../src/sgoen/themoviedb/ConfigurationService.php';
require_once dirname(__FILE__) . '/../src/sgoen/themoviedb/MovieService.php';
require_once dirname(__FILE__) . '/../src/sgoen/themoviedb/Configuration.php';
require_once dirname(__FILE__) . '/../src/sgoen/themoviedb/Movie.php';
require_once dirname(__FILE__) . '/../src/sgoen/themoviedb/JSONDecodeException.php';
require_once dirname(__FILE__) . '/../src/sgoen/themoviedb/CurlException.php';
require_once dirname(__FILE__) . '/../src/sgoen/themoviedb/TheMovieDbAPIException.php';

include dirname(__FILE__) . '/settings.php';

use sgoen\themoviedb\ConfigurationService;
use sgoen\themoviedb\MovieService;

$configurationService = new ConfigurationService($apiKey, $apiBaseUrl);
var_dump($configurationService->getConfiguration());

$movieService = new MovieService($apiKey, $apiBaseUrl);
var_dump($movieService->searchMovie('pitch black'));
var_dump($movieService->getMovieById(2787));
var_dump($movieService->getMovieById(1));
