<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserInvoiceEmail extends Mailable
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
        $users = $this->data['user'];
        $notes = $this->data['notes'];
        $grandtotal = $this->data['grandtotal'];
        $discount = $this->data['discount'];
        $total = $this->data['total'];
        $products = $this->data['products'];
        // $filterView = view('admin.email.catalogue_email', compact('products','companyaccount','user'))->render();
         return $this->subject($this->subject)->view('front.email.invoice_email', compact('products','companyaccount','users','notes','total','discount','grandtotal'));
    }
}
