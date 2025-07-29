<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        $totalVisits = Visit    ::count();

        $topPages = Visit::select('url')
            ->groupBy('url')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(5)
            ->pluck('url');

        $visitsByDevice = Visit::select('device_type')
            ->selectRaw('count(*) as total')
            ->groupBy('device_type')
            ->get();

        $recentVisits = Visit::orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('analytics.dashboard', compact(
            'totalVisits',
            'topPages',
            'visitsByDevice',
            'recentVisits'
        ));
    }
}
