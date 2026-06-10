<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TermsUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $terms;

    /**
     * Create a new message instance.
     */
    public function __construct($terms)
    {
        $this->terms = $terms;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('📄 We’ve Updated Our Terms of Service')
                    ->markdown('emails.terms-updated', [
                        'url' => route('terms'),
                    ]);
    }
}
