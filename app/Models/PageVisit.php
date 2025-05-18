<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageVisit extends Model
{
// In App\Models\PageVisit.php
    protected $fillable = [
        'ip', 'route', 'user_agent', 'country', 'region', 'city', 'postal_code', 'latitude', 'longitude'
    ];
}
