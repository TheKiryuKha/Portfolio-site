<?php

declare(strict_types=1);

namespace App\Providers;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->configureModels();
        $this->configureUrls();
        $this->configureDb();
    }

    private function configureModels(): void
    {
        Model::shouldBeStrict();
        Model::unguard();
    }

    private function configureDb(): void
    {
        DB::prohibitDestructiveCommands(app()->isProduction());
    }

    private function configureUrls(): void
    {
        URL::forceHttps(app()->isProduction());
    }
}
