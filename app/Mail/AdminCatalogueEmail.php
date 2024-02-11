<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminCatalogueEmail extends Mailable
{
    use Queueable, SerializesModels;

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
        $users = $this->data['user'];
        $notes = $this->data['notes'];
        $link = $this->data['link'];
        $products = $this->data['products'];
        // $filterView = view('admin.email.catalogue_email', compact('products','companyaccount','user'))->render();
         return $this->subject($this->subject)->view('admin.email.catalogue_email', compact('products','companyaccount','users','link','notes'));
    }
}
