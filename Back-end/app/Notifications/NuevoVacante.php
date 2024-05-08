<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoVacante extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $job_postings_id;
    public $users_id;
    public $job_posting_title;
    public function __construct($job_postings_id, $users_id, $job_posting_title)
    {
        //

        $this->job_postings_id = $job_postings_id;
        $this->users_id = $users_id;
        $this->job_posting_title = $job_posting_title;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase($notifiable)
    {
        return [
            //
            'job_postings_id' => $this->job_postings_id,
            'users_id' => $this->users_id,
            'job_posting_title' => $this->job_posting_title,
        ];
    }
}
