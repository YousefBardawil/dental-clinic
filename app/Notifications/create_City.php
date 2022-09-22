<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class create_City extends Notification
{
    use Queueable;
    private $cities_id;
    private $cities_city_name;
    private $city_create ;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $cities_id , $cities_city_name ,$city_create)
    {
        $this->cities_id = $cities_id;
        $this->cities_city_name = $cities_city_name;
        $this->city_create = $city_create;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
            'cities_id' => $this->cities_id,
            'cities_name' => $this->cities_city_name,
            'city_create' => $this->city_create,
        ];
    }
}
