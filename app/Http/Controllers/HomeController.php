<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Queries\GetHomePageData;
use Illuminate\View\View;

final class HomeController
{
    public function __invoke(GetHomePageData $query): View
    {
        return view('home', $query->handle());
    }
}
