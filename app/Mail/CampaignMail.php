<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Campaign;

class CampaignMail extends Mailable
{
    use Queueable, SerializesModels;

    public $campaign;

    /**
     * Create a new message instance.
     */
    public function __construct(Campaign $campaign)
    {
        $this->campaign = $campaign;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject('Phishing Awareness: ' . $this->campaign->subject)
                    ->view('emails.campaign')
                    ->with([
                        'subject' => $this->campaign->subject,
                        'body' => $this->campaign->email_body,
                        'phishing_link' => $this->campaign->phishing_link,
                    ]);
    }
}
