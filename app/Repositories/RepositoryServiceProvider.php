<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
   public function register()
   {
      $this->app->bind(
         'App\Repositories\ProvinsiInterface',
         'App\Repositories\ProvinsiRepository'
      );

      $this->app->bind(
         'App\Repositories\KotaInterface',
         'App\Repositories\KotaRepository'
      );

      $this->app->bind(
         'App\Repositories\KecamatanInterface',
         'App\Repositories\KecamatanRepository'
      );

      $this->app->bind(
         'App\Repositories\KelurahanInterface',
         'App\Repositories\KelurahanRepository'
      );

      $this->app->bind(
         'App\Repositories\PasienInterface',
         'App\Repositories\PasienRepository'
      );
   }
}
