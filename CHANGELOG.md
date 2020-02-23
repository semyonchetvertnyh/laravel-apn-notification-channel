# Changelog

All notable changes will be documented in this file.

## [v1.0.0 (2020-02-23)](https://github.com/semyonchetvertnyh/laravel-apn-notification-channel/compare/v0.1.5...v1.0.0)

- Add support for Laravel 6.0 ([#23](https://github.com/semyonchetvertnyh/laravel-apn-notification-channel/pull/23))
- Add support of Certificate-based authentication ([#25](https://github.com/semyonchetvertnyh/laravel-apn-notification-channel/pull/25))
- Use Pushok client v0.10 ([#25](https://github.com/semyonchetvertnyh/laravel-apn-notification-channel/pull/25))
- Fix bug when badge is zero ([#25](https://github.com/semyonchetvertnyh/laravel-apn-notification-channel/pull/25))

## [v0.1.5 (2019-02-19)](https://github.com/semyonchetvertnyh/laravel-apn-notification-channel/compare/v0.1.4...v0.1.5)

- Add support for Laravel 5.8

## [v0.1.4 (2019-01-22)](https://github.com/semyonchetvertnyh/laravel-apn-notification-channel/compare/v0.1.3...v0.1.4)

- Add possibility to return an Arrayable object in routeNotificationForApn()

## [v0.1.3 (2019-01-15)](https://github.com/semyonchetvertnyh/laravel-apn-notification-channel/compare/v0.1.2...v0.1.3)

- Add "apn" channel to Channel Manager as extension 

## [v0.1.2 (2018-12-14)](https://github.com/semyonchetvertnyh/laravel-apn-notification-channel/compare/v0.1.1...v0.1.2)

- Force routeNotificationFor('apn', $notifiable) as array
- Simplify env variable name in README

## [v0.1.1 (2018-12-14)](https://github.com/semyonchetvertnyh/laravel-apn-notification-channel/compare/v0.1.0...v0.1.1)

- Add APNs response to an exception

## v0.1.0 (2018-12-14)

- Initial release
