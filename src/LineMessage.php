<?php

namespace NotificationChannels\Line;

use NotificationChannels\Line\Exceptions\CouldNotSendNotification;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;

class LineMessage extends TextMessageBuilder
{
    /** @var string[] */
    private $texts;
    /** @var array */
    private $message = [];

    public function __construct($text, $extraTexts = null)
    {
        $extra = [];
        if (!is_null($extraTexts)) {
            $args = func_get_args();
            $extra = array_slice($args, 1);
        }

        if (count($extra) >= 4) {
            throw CouldNotSendNotification::exceededOfMessages(count($extra) + 1);
        }

        $this->texts = array_merge([$text], $extra);

        $this->contents = $contents;
    }
}
