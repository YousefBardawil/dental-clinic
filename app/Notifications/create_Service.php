<?php

namespace App\Notifications;

use App\Models\Service;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class create_Service extends Notification
{
    use Queueable;

    private $services;
    private $service_create;
    private $clients_name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Service $services , $service_create , $clients_name )
    {
        $this->services = $services;
        $this->service_create = $service_create;
        $this->clients_name = $clients_name;
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
    public function toMail($notifiable)
    {

        foreach($this->clients_name as $client_name){
            return (new MailMessage)
            ->from('barrett@example.com', 'yousefbardawil')
            ->line($client_name)
            ->greeting($this->services->service_name)
            ->line($this->services->description)
            ->line($this->service_create)
            ->action('Go to ', url('/'))
            ->line('Thank you');

        }


                    // to attach file
                    // ->attach('/path/to/file', [
                    //     'as' => 'name.pdf',
                    //     'mime' => 'application/pdf',
                    // ]);

                    // ->attachFromStorage('/path/to/file');

                    // ->attachMany([
                    //     '/path/to/forge.svg',
                    //     '/path/to/vapor.svg' => [
                    //         'as' => 'Logo.svg',
                    //         'mime' => 'image/svg+xml',
                    //     ],

                    // to return view template
                    //  return (new MailMessage)->view(
                    //  'cms.admin.index', ['services' => $this->services]);

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
