<?php

namespace App\Models;

use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'scheme',
        'domain',
        'default',
    ];




    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
