<?php


require_once dirname(__FILE__) . '/../src/sgoen/themoviedb/Client.php';
require_once dirname(__FILE__) . '/../src/sgoen/themoviedb/Configuration.php';
require_once dirname(__FILE__) . '/../src/sgoen/themoviedb/Movie.php';

include dirname(__FILE__) . '/settings.php';

use sgoen\themoviedb\Client;

$cl = new Client($apiKey, $apiBaseUrl);

var_dump($cl->getConfiguration());
var_dump($cl->searchMovie('pitch black'));
var_dump($cl->getMovieById(2787));
