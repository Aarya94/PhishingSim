<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\PhishingLog;

class DashboardController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::latest()->get();
        $logs = PhishingLog::latest()->take(20)->get(); // show last 20 logs

        return view('dashboard.index', compact('campaigns', 'logs'));
    }
}
