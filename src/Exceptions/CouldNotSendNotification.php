<?php

namespace NotificationChannels\Line\Exceptions;

use LINE\LINEBot\Response;
use LINE\LINEBot\Exception\CurlExecutionException;

class CouldNotSendNotification extends \Exception
{
    public static function serviceRespondedWithAnError(Response $response)
    {
        $responseBody = $response->getJSONDecodedBody();
        $errorMsg = $response->getHeader('X-Line-Request-Id').': '.$responseBody['message'];

        if (preg_match('/The request body has [\d]+ errors?/', $responseBody['message'], $matches)) {
            foreach ($responseBody['details'] as $detail) {
                $errorMsg .= PHP_EOL.$detail['message'];
                $errorMsg .= PHP_EOL.$detail['property'];
            }
        }

        return new static($errorMsg);
    }

    public static function curlError(CurlExecutionException $exeption)
    {
        return new static('LINEBot Curl error: '.$exeption->getMessage());
    }

    public static function exceededOfMessages(int $count)
    {
        return new static('It exceeds the maximum of messages that can be sent. max:5, attempted:'.$count);
    }
}
