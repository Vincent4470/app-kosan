<?php

namespace App\Interfaces;

interface CityRepositoryInterface
{
    public function getAllCities();

    public function getCityByslug($slug);
}


