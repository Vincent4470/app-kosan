<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private BoardingHouseRepositoryInterface $boardingHouseRepository;
    private CityRepositoryInterface $city_repository;

    public function __construct(
        BoardingHouseRepositoryInterface $boardingHouseRepository,
        CityRepositoryInterface $city_repository
    ) {
        $this->boardingHouseRepository = $boardingHouseRepository;
        $this->city_repository = $city_repository;
    }

    public function show($slug)
    {
        $city = $this->city_repository->getCityBySlug($slug);
        $boardingHouses = $this->boardingHouseRepository->getBoardingHouseByCitySlug($slug);
        return view('pages.city.show', compact('city', 'boardingHouses'));
    }
}
