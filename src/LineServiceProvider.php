<?php

namespace NotificationChannels\Line;

use Illuminate\Support\ServiceProvider;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot;

class LineServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
    **/
    public function boot()
    {
        // Bootstrap code here.

        $this->app->when(LineChannel::class)
            ->needs(LINEBot::class)
            ->give(function () {
                $httpClient = new CurlHTTPClient(config('services.line.token'));

                return new LINEBot(
                    $httpClient,
                    ['channelSecret' => config('services.line.secret')]
                );
            });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
