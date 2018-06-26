<?php

namespace NotificationChannels\Line;

use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use NotificationChannels\Line\Exceptions\CouldNotSendNotification;

class LineMessage extends TextMessageBuilder
{
    /** @var string[] */
    private $texts;
    /** @var array */
    private $message = [];

    public function __construct($text, $extraTexts = null)
    {
        $extra = [];
        if (! is_null($extraTexts)) {
            $args = func_get_args();
            $extra = array_slice($args, 1);
        }

        if (count($extra) >= 4) {
            throw CouldNotSendNotification::exceededOfMessages(count($extra) + 1);
        }

        $this->texts = array_merge([$text], $extra);
    }
}
