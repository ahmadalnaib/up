<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SiteStoreRequest;

class SiteStoreController extends Controller
{
    //

 

    public function __invoke(SiteStoreRequest $request)
    {

        $site = $request->user()->sites()->create($request->only(['domain']));
        return redirect()->route('dashboard',$site);
       
    }
}
