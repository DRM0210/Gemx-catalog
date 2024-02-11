<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserQuotationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $data;
    public $subject;
    /**
     * Create a new message instance.
     */
    public function __construct($data, $subject)
    {
        $this->data = $data;
        $this->subject = $subject;
    }

    public function build()
    {
        $data = $this->data;
        $companyaccount = $this->data['companyaccount'];
        $users = $this->data['users'];
        $notes = $this->data['notes'];
        $products = $this->data['products'];
        // $filterView = view('admin.email.catalogue_email', compact('products','companyaccount','user'))->render();
         return $this->subject($this->subject)->view('front.email.catalogue_email', compact('products','companyaccount','users','notes'));
    }
}
