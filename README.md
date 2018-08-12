# LINE notification channels for Laravel 5.3+

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kpherox/laravel-notification-line.svg?style=flat-square)](https://packagist.org/packages/kpherox/laravel-notification-line)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/kpherox/laravel-notification-line/master.svg?style=flat-square)](https://travis-ci.org/kpherox/laravel-notification-line)
[![StyleCI](https://styleci.io/repos/138256386/shield)](https://styleci.io/repos/138256386)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/8139c804-4988-4f9a-ac1e-69e5f94081c4.svg?style=flat-square)](https://insight.sensiolabs.com/projects/8139c804-4988-4f9a-ac1e-69e5f94081c4)
[![Quality Score](https://img.shields.io/scrutinizer/g/kpherox/laravel-notification-line.svg?style=flat-square)](https://scrutinizer-ci.com/g/kpherox/laravel-notification-line)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/kpherox/laravel-notification-line/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/kpherox/laravel-notification-line/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/kpherox/laravel-notification-line.svg?style=flat-square)](https://packagist.org/packages/kpherox/laravel-notification-line)

This package makes it easy to send notifications using [LINE](https://developers.line.me/) with Laravel 5.3.

## Contents

- [Installation](#installation)
	- [Setting up the LINE service](#setting-up-the-line-service)
- [Usage](#usage)
	- [Text Message](#text-message)
	- [Custom User](#custom-user)
- [Changelog](#changelog)
- [Testing](#testing)
- [Security](#security)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)


## Installation

You can install this package via composer:
```
composer require kpherox/laravel-notification-line
```

### Setting up the LINE service
1. [Start using Messaging API](https://developers.line.me/console/register/messaging-api/provider/)
    - Select Plan: `Developer Trial`, Or upgrade to `Pro` after selecting `Free`.
2. Click the `Messaging settings` button on your channel.
3. Paste your channel's access token and secret, in your `services.php` config file:
```
...
'line' => [
	'token'    => env('LINE_CHANNEL_ACCESS_TOKEN'),
	'secret' => env('LINE_CHANNEL_SECRET'),
	'userd'   => env('LINE_DEFAULT_USER_ID')
]
...
```

## Usage

Follow Laravel's documentation to add the channel to your Notification class.

### Text Message

```php
use NotificationChannels\Line\LineChannel;
use NotificationChannels\Line\LineMessage;

class NewsWasPublished extends Notification
{

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [LineChannel::class];
    }

    public function toLine($notifiable)
    {
        return new LineMessage('Laravel notifications are awesome!'/*, 'Multiple message. Max: 5'*/);
    }
}
```

### Custom User
If you need to change the user, add the `routeNotificationForLine` method to the model:
```
class LineUser extends Eloquent
{
    use Notifiable;

    public function routeNotificationForLine()
    {
        return $this->id;
    }
...
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Security

If you discover any security related issues, please email admin@mail.kr-kp.com instead of using the issue tracker.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [kPherox](https://github.com/kPherox)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
