<?php

namespace App\Http\Controllers\Tools\YouTube;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class EarningsCalculatorController extends Controller
{
    public function index()
    {
        $tool = Tool::where('slug', 'youtube-earnings-calculator')->firstOrFail();
        return view('tools.youtube.earnings-calculator', compact('tool'));
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'daily_views' => 'required|numeric|min:0',
            'cpm' => 'nullable|numeric|min:0',
            'engagement_rate' => 'nullable|numeric|min:0|max:100'
        ]);

        try {
            $dailyViews = $request->daily_views;
            $cpm = $request->cpm ?? 2.5; // Default CPM
            $engagementRate = $request->engagement_rate ?? 50; // Default 50%

            // Calculate earnings
            $dailyEarnings = ($dailyViews / 1000) * $cpm * ($engagementRate / 100);
            $monthlyEarnings = $dailyEarnings * 30;
            $yearlyEarnings = $dailyEarnings * 365;

            return response()->json([
                'success' => true,
                'data' => [
                    'daily_earnings' => round($dailyEarnings, 2),
                    'monthly_earnings' => round($monthlyEarnings, 2),
                    'yearly_earnings' => round($yearlyEarnings, 2),
                    'daily_views' => $dailyViews,
                    'cpm' => $cpm,
                    'engagement_rate' => $engagementRate
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to calculate earnings: ' . $e->getMessage()
            ], 500);
        }
    }
}
