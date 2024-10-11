<?php

namespace App\Observers;

use App\Models\Site;

class SiteObserver
{
    //

    public function updating(Site $site)
    {
        if(in_array('default', array_keys($site->getDirty()))){
            $site->user->sites()->whereKeyNot($site->id)->update(['default'=>false]);
        
       }
    }
}
