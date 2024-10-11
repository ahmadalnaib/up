<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Inertia\Inertia;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function __invoke(Request $request,Site $site)
    {
        return Inertia::render('Dashboard',[
            'site'=> $site,
            'sites'=> Site::get()
        ]);
    }
}
