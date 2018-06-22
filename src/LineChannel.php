<?php

namespace NotificationChannels\Line;

use NotificationChannels\Line\Exceptions\CouldNotSendNotification;
use NotificationChannels\Line\Events\MessageWasSent;
use NotificationChannels\Line\Events\SendingMessage;
use Illuminate\Notifications\Notification;

class LineChannel
{
    public function __construct()
    {
        // Initialisation code here
    }

    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     *
     * @throws \NotificationChannels\Line\Exceptions\CouldNotSendNotification
     */
    public function send($notifiable, Notification $notification)
    {
        //$response = [a call to the api of your notification send]

//        if ($response->error) { // replace this by the code need to check for errors
//            throw CouldNotSendNotification::serviceRespondedWithAnError($response);
//        }
    }
}
