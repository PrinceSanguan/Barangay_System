<?php

namespace App\Mail;

use App\Models\Certificate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CertificateApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $certificate;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\Certificate $certificate
     */
    public function __construct(Certificate $certificate)
    {
        $this->certificate = $certificate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Certificate Approved')
                    ->view('emails.certificate-approved')
                    ->with([
                        'name' => $this->certificate->user->name,
                        'certificateType' => ucfirst(str_replace('_', ' ', $this->certificate->certificate_type)),
                        'price' => $this->certificate->price,
                        'purpose' => $this->certificate->purpose,
                        'date' => $this->certificate->certificate_date,
                    ]);
    }
}