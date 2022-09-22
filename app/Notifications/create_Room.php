<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\VonageMessage;

class create_Room extends Notification
{
    use Queueable;
    private $rooms_id;
    private $rooms_room_name;
    private $room_create ;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($rooms_id,$rooms_room_name,$room_create )
    {
        $this->rooms_id = $rooms_id;
        $this->rooms_room_name = $rooms_room_name;
        $this->room_create = $room_create;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // return ['database' , 'broadcast'];

        return ['database'];

        // if($notifiable->notify_mail){
        //     $via[]='mail';
        // }

        // if($notifiable->notify_sms){
        //     $via[]='vonage';
        // }

        // return $via;

    }


    // public function toBroadcast($notifiable){
    //     return[
    //         'rooms_id' => $this->rooms_id,
    //         'rooms_name' => $this->rooms_room_name,
    //         'room_create' => $this->room_create,
    //     ];
    // }

    // public function toVonage($notifiable){

    //     return (new VonageMessage)
    //     ->content('Your SMS message content');

    //  }


    public function toDatabase($notifiable)
    {
        return [
            'rooms_id' => $this->rooms_id,
            'rooms_name' => $this->rooms_room_name,
            'room_create' => $this->room_create,
        ];
    }
}
