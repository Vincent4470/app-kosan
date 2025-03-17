<?php

namespace App\Repositories;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Models\BoardingHouse;
use Illuminate\Database\Eloquent\Builder;

class BoardingHouseRepository implements BoardingHouseRepositoryInterface
{
    public function getAllBoardingHouses($search = null, $city = null, $category = null)
    {
        $query = BoardingHouse::query();

        // disini ketika search diisi maka dia akan melakukan pencarian
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // disini ketika city diisi maka mencari berdasarkan city
        if ($city) {
            $query->whereHas('city', function ($query) use ($city) { // Perbaikan
                $query->where('slug', $city);
            });
        }

        // disini ketika category diisi maka mencari berdasarkan category
        if ($category) {
            $query->whereHas('category', function ($query) use ($category) { // Perbaikan
                $query->where('slug', $category);
            });
        }

        return $query->get();
    }

    public function getPopularBoardingHouses($limit = 5)
    {
        return BoardingHouse::withCount('transactions')->orderBy('transactions_count', 'desc')->take($limit)->get();
    }

    public function getBoardingHouseByCitySlug($slug)
    {
        return BoardingHouse::whereHas('city', function ($query) use ($slug) { // Perbaikan
            $query->where('slug', $slug);
        })->get();
    }

    public function getBoardingHouseByCategorySlug($slug)
    {
        return BoardingHouse::whereHas('category', function ($query) use ($slug) { // Perbaikan
            $query->where('slug', $slug);
        })->get();
    }

    public function getBoardingHouseBySlug($slug)
    {
        return BoardingHouse::where('slug', $slug)->first();
    }
}
