<?php

namespace App\Repositories;

use App\Interfaces\CityRepositoryInterface;
use App\Models\City;

class CityRepository implements CityRepositoryInterface
{
    public function getAllCities()
    {
        return City::all();
    }

    public function getCityByslug($slug)
    {
        return City::where('slug', $slug)->first();
    }
}
