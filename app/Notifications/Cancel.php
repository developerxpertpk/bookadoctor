<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Booking;

class Cancel extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
       //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }


    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
   public function toMail($notifiable) {

        //$user = User::where('email', Input::get('email'))->get()->first();
        $book = Booking::find($id);
        if ($book) {
            if ($book->medic_id) {
                return (new MailMessage)
                                ->line('You are receiving this email because your booking has been cancelled. Please reschedule your booking. Thank You.')
                                ->action('Booking_status', url('booking/cancel', $this->token))
                                ->line('If you did not request a reschedule booking, no further action is required.');
            } else {
                return (new MailMessage)
                                ->line('You are receiving this email because your booking has been cancelled. Please reschedule your booking. Thank You.')
                                ->action('Booking_status', url('admin/password/reset', $this->token))
                                ->line('If you did not request a reschedule booking, no further action is required.');
            }
        }
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
