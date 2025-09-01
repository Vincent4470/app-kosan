<?php

namespace App\Providers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;
use App\Interfaces\TransactionRepository;
use App\Interfaces\TransactionRepositoryInterface;
use App\Models\Transaction;
use App\Repositories\BoardingHouseRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CityRepository;
use App\Repositories\TransactionRepository as RepositoriesTransactionRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(BoardingHouseRepositoryInterface::class, BoardingHouseRepository::class);
        $this->app->bind(TransactionRepositoryInterface::class, RepositoriesTransactionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
