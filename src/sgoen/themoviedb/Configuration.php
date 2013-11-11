<?php

namespace sgoen\themoviedb;

class Configuration
{
	public $images;
	public $change_keys;

	public function __construct($decoded)
	{
		$this->fromArray($decoded);
	}

	public function fromArray($arr)
	{
		foreach(get_class_vars(get_class($this)) as $key => $value)
		{
			if(isset($arr[$key]))
			{
				$this->$key = $arr[$key];
			}
		}
	}
}
