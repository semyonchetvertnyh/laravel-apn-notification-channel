<?php

namespace SemyonChetvertnyh\ApnNotificationChannel;

use Illuminate\Support\Collection;
use Pushok\ApnsResponseInterface;

class ApnsResponseCollection extends Collection
{
    /**
     * Filter to only unsuccessful responses.
     *
     * @return \SemyonChetvertnyh\ApnNotificationChannel\ApnsResponseCollection
     */
    public function onlyUnsuccessful()
    {
        return $this->reject(function (ApnsResponseInterface $response) {
            return $response->getStatusCode() === 200;
        });
    }

    /**
     * Filter to having outdated token responses.
     *
     * @return \SemyonChetvertnyh\ApnNotificationChannel\ApnsResponseCollection
     */
    public function havingOutdatedDeviceToken()
    {
        return $this->filter(function (ApnsResponseInterface $response) {
            return in_array($response->getErrorReason(), [
                'BadDeviceToken',
                'Unregistered',
            ]);
        });
    }

    /**
     * Get all device tokens.
     *
     * @return array
     */
    public function allDeviceTokens()
    {
        return $this->map(function (ApnsResponseInterface $response) {
            return $response->getDeviceToken();
        })->all();
    }
}
