<?php

namespace App\Mail;

use App\Listing;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ListingContactCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $listing;

    public $user;

    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Listing $listing, User $user, $body)
    {
        $this->listing = $listing;
        $this->user = $user;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.listing.contact.message')
            ->subject("{$this->user->name} sent a message about {$this->listing->title}")
            ->from("hello@world.com")
            ->replyTo($this->user->email);
    }
}
