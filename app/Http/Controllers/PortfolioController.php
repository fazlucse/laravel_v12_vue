<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\PageVisit;

class PortfolioController extends Controller
{
    public function index()
    {
        $totalVisits = PageVisit::count();

        return Inertia::render('landing/index', [
            'totalVisits' => $totalVisits
        ]);
    }
}
