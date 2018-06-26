<?php

namespace NotificationChannels\Line\Exceptions;

use LINE\LINEBot\Exception\CurlExecutionException;
use LINE\LINEBot\Response;

class CouldNotSendNotification extends \Exception
{
    public static function serviceRespondedWithAnError(Response $response)
    {
        $responseBody = $response->getJSONDecodedBody();
        $errorMsg = $response->getHeader('X-Line-Request-Id').": ".$responseBody['message'];

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
        return new static("LINEBot Curl error: ".$exeption->getMessage());
    }
}
