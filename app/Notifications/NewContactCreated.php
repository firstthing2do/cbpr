<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewContactCreated extends Notification
{
    use Queueable;

    protected $contact;
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }
    public function via($notifiable)
    {
        return ['mail'];
    }
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('New Contact Added')
            ->line('A new contact has been added to your contact list')
            ->line('Name: '. $this->contact->name)
            ->line('Email: '. $this->contact->email)
            ->action('View Contact', url('/contacts'))
            ->line('Thank you for using our application!');
    }
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
