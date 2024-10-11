<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Inertia\Inertia;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function __invoke()
    {
        return Inertia::render('Dashboard',[
            'site'=> Site::find(1)
        ]);
    }
}
