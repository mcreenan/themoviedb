<?php

namespace sgoen\themoviedb;

class Movie
{
    public $adult;
    public $backdrop_path;
    public $belongs_to_collection;
    public $budget;
    public $credits;
    public $genres;
    public $homepage;
    public $id;
    public $images;
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

    public function __construct($data)
    {
        $this->fromArray($data);
    }

    public function fromArray($arr)
    {
        foreach ($arr as $key => $value) {
            if (property_exists(__CLASS__, $key)) {
                $this->$key = $value;
            }
        }
    }
}
