<?php

namespace sgoen\themoviedb;

class Movie
{
	public $adult;
	public $backdrop_path;
	public $belongs_to_collection;
	public $budget;
	public $genres;
	public $homepage;
	public $id;
	public $imdb_id;
	public $original_title;
	public $overview;
	public $popularity;
	public $poster_path;
	public $production_companies;
	public $production_countries;
	public $release_date;
	public $revenue;
	public $runtime;
	public $spoken_languages;
	public $status;
	public $tagline;
	public $title;
	public $vote_average;
	public $vote_count;
	
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
