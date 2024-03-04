<?php

namespace App\Http\Controllers;

use Artisan;

class ArtisanController extends Controller
{
    public function migrate()
    {
        Artisan::call('migrate');
    }

    public function seed()
    {
        Artisan::call('db:seed');
    }

    public function migrateAndSeed()
    {
        Artisan::call('migrate --seed');
    }

    public function migrateFreshAndSeed()
    {
        Artisan::call('migrate:fresh --seed');
    }

    public function storageLink()
    {
        Artisan::call('storage:link');
    }

    public function clear()
    {
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
    }
}
