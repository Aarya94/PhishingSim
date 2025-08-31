<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use Illuminate\Support\Facades\Mail;
use App\Mail\CampaignMail;

class CampaignController extends Controller
{
    public function index()
    {
        return view('campaigns.index', [
            'campaigns' => Campaign::latest()->get()
        ]);
    }

    public function create()
    {
        return view('campaigns.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required',
            'email_body' => 'required',
        ]);

        $campaign = Campaign::create([
            'subject' => $validated['subject'],
            'email_body' => $validated['email_body'],
            // always point phishing link to your login route
            'phishing_link' => url('/facebook-login'),
            'target_list' => $request->input('target_list', ''), // optional recipients
            'status' => 'draft',
        ]);

        return redirect()->route('campaigns.index')
                         ->with('success', 'Campaign created successfully.');
    }

    public function show(Campaign $campaign)
    {
        return view('campaigns.show', compact('campaign'));
    }

    public function edit(Campaign $campaign)
    {
        return view('campaigns.edit', compact('campaign'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        $validated = $request->validate([
            'subject' => 'required',
            'email_body' => 'required',
        ]);

        $campaign->update([
            'subject' => $validated['subject'],
            'email_body' => $validated['email_body'],
            'target_list' => $request->input('target_list', $campaign->target_list),
            'status' => $campaign->status,
        ]);

        return redirect()->route('campaigns.index')
                         ->with('success', 'Campaign updated successfully.');
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();

        return redirect()->route('campaigns.index')
                         ->with('success', 'Campaign deleted successfully.');
    }

    // 🔹 Send a test email (Mailtrap inbox only)
    public function sendTest(Campaign $campaign)
    {
        $recipient = "test@example.com"; // 👈 put your Mailtrap test email here
        Mail::to($recipient)->send(new CampaignMail($campaign));

        return back()->with('success', 'Test email sent to ' . $recipient);
    }

    // 🔹 Send campaign emails to all recipients
    public function send(Campaign $campaign)
    {
        if (empty($campaign->target_list)) {
            return back()->with('error', 'No recipients found for this campaign.');
        }

        $recipients = explode(',', $campaign->target_list);

        foreach ($recipients as $recipient) {
            Mail::to(trim($recipient))->send(new CampaignMail($campaign));
        }

        $campaign->update(['status' => 'completed']);

        return back()->with('success', 'Campaign emails sent successfully!');
    }
}
