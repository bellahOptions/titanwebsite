<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvoiceEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $user;

    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->user = $order->user;
    }

    public function build()
    {
        return $this->subject('Invoice for Your Order #' . $this->order->order_number)
                    ->view('emails.invoice')
                    ->attachData($this->generatePDF(), 'invoice-' . $this->order->order_number . '.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }

    private function generatePDF()
    {
        // For now, return simple PDF content
        // You can integrate with DomPDF or similar package later
        $pdfContent = "Invoice #{$this->order->order_number}\n\n";
        $pdfContent .= "Thank you for your order!\n";
        $pdfContent .= "Amount: {$this->order->formatted_amount}\n";
        
        return $pdfContent;
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

}
    
