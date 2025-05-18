<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageVisit;

class PageVisitController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'ip' => 'nullable|ip',
            'route' => 'required|string',
            'user_agent' => 'nullable|string',
            'country' => 'nullable|string',
            'region' => 'nullable|string',
            'city' => 'nullable|string',
            'postal_code' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);
        try {

            PageVisit::create($data);

            return response()->json(['message' => 'Visitor data saved']);
        } catch (\Exception $e) {
            \Log::error('Visitor store error: ' . $e->getMessage());
            return response()->json(['error' => 'Server error'], 500);
        }
    }

    public function count()
    {
        $count = Visitor::count();
        return response()->json(['visitors' => $count]);
    }
}
