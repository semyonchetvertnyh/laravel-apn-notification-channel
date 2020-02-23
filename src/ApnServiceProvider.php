<?php

namespace SemyonChetvertnyh\ApnNotificationChannel;

use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\ServiceProvider;
use InvalidArgumentException;
use Pushok\AuthProvider\Certificate;
use Pushok\AuthProvider\Token;
use Pushok\Client;

class ApnServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->app->bind(Client::class, function ($app) {
            $config = $app['config']->get('broadcasting.connections.apn');

            return new Client(
                $this->authProvider($config), $config['is_production']
            );
        });

        $this->app->make(ChannelManager::class)->extend('apn', function () {
            return new ApnChannel(
                $this->app->make(Client::class)
            );
        });
    }

    /**
     * Determine and get the auth provider.
     *
     * @param  array  $config
     * @return \Pushok\AuthProviderInterface
     */
    protected function authProvider($config)
    {
        $config['driver'] = $config['driver'] ?? 'jwt';

        if ($config['driver'] === 'jwt') {
            return Token::create([
                'key_id' => $config['key_id'],
                'team_id' => $config['team_id'],
                'app_bundle_id' => $config['app_bundle_id'],
                'private_key_path' => $config['private_key_path'],
                'private_key_secret' => $config['private_key_secret'],
            ]);
        }

        if ($config['driver'] === 'certificate') {
            return Certificate::create([
                'certificate_path' => $config['certificate_path'],
                'certificate_secret' => $config['certificate_secret'],
            ]);
        }

        throw new InvalidArgumentException("Driver [{$config['driver']}] is not supported.");
    }
}
