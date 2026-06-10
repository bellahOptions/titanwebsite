<?php

namespace App\Mail;

use App\Models\Property;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PropertyActionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $action;
    public $property;

    public function __construct($action, Property $property)
    {
        $this->action = $action;
        $this->property = $property;
    }

    public function build()
    {
        return $this->subject("Property {$this->action}: {$this->property->title}")
                    ->markdown('emails.property.action');
    }
}
