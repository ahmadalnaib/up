<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\SiteResource;

class DashboardController extends Controller
{
    //

    
    
    
    public function __invoke(Request $request,Site $site)
    {
        $site->update(['default'=>true]);

        if(!$site->exists){
            $site = $request->user()->sites()->whereDefault(true)->first() ?? $request->user()->sites()->first();
        }



        return Inertia::render('Dashboard',[
            'site'=> SiteResource::make($site),
            'sites'=> SiteResource::collection(Site::get())
        ]);
    }
}
