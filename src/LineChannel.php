<?php

namespace NotificationChannels\Line;

use NotificationChannels\Line\Exceptions\CouldNotSendNotification;
use Illuminate\Notifications\Notification;
use LINE\LINEBot;

class LineChannel
{
    /** @var \LINE\LINEBot */
    protected $line;

    /**
     * @param \LINE\LINEBot $line
    **/
    public function __construct(LINEBot $line)
    {
        $this->line = $line;
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
