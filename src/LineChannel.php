<?php

namespace NotificationChannels\Line;

use LINE\LINEBot;
use Illuminate\Notifications\Notification;
use LINE\LINEBot\Exception\CurlExecutionException;
use NotificationChannels\Line\Exceptions\CouldNotSendNotification;

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
        $lineMessage = $notification->toLine($notifiable);

        $to = $notifiable->routeNotificationFor('line') ?: config('services.line.user_id');

        try {
            $response = $this->line->pushMessage($to, $lineMessage);
        } catch (CurlExecutionException $e) {
            throw CouldNotSendNotification::curlError($e);
        }

        if (! $response->isSucceeded()) {
            throw CouldNotSendNotification::serviceRespondedWithAnError($response);
        }
    }
}
