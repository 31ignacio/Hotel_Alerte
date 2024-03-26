<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Markdown;
use Illuminate\Support\HtmlString;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @param  array  $data
     * @return void
     */

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        //
        $this->data= $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Form Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
       
        $content = new HtmlString($this->view('mails.contact_mail', ['data' => $this->data])->render());
$mailContent = new Content($content);
$mailContent->subject('zerrrr');

return $mailContent;

    
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


     /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.contact_mail')
                    ->subject('New contact Enquiry')
                    ->with([
                        'data' => $this->data,
                    ]);
    }
}
