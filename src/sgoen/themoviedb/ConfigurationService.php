<?php

namespace sgoen\themoviedb;

use sgoen\themoviedb\AbstractService;
use sgoen\themoviedb\Configuration;

class ConfigurationService extends AbstractService
{
	public function getConfiguration()
	{
		$response = $this->_request("/configuration?api_key={$this->_apiKey}");
		$configuration = new Configuration($response);

		return $configuration;
	}
}
