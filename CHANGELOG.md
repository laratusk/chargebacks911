# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.2.0] - 2026-03-26

### Added

- Allow Pest 4 and Testbench 10 as development dependencies.

### Changed

- Rebuild the CI test matrix around explicit Laravel-to-Testbench pairs and exclude PHP 8.2
  from the Laravel 13 job, since Laravel 13 requires PHP 8.3 or newer.
- Disable the `fully_qualified_strict_types` Pint rule and restore imported class names in
  docblocks, return types and closures, so runtime type resolution keeps working.

### Removed

- Drop Laravel 10 support; `illuminate/support`, `illuminate/http` and `illuminate/cache` now
  require `^11.0|^12.0|^13.0`.

## [1.1.0] - 2026-03-16

### Added

- Laravel 13 support: allow `illuminate/support`, `illuminate/http` and `illuminate/cache` `^13.0`,
  plus Testbench 11, and run the CI test matrix against Laravel 11, 12 and 13.
- Usage examples in the readme covering installation, configuration and every resource
  (merchant, orders, chargebacks, alerts, alert outcomes and webhooks).

## [1.0.0] - 2026-02-27

Initial release of the Chargebacks911 API client for Laravel.

### Added

- `ChargeBack` facade-style entry point exposing the `orders()`, `chargebacks()`, `webhooks()`,
  `alerts()`, `alertOutcomes()` and `merchant()` resources.
- Resource classes wrapping the Chargebacks911 v2 REST API for merchants, orders, chargebacks,
  alerts, alert outcomes and webhooks.
- `Authenticatable` concern handling bearer-token authentication with cached tokens and mapping
  API failures onto typed exceptions.
- Typed exception hierarchy: `ChargebackException` with `ApiException`, `AuthenticationException`,
  `NotFoundException`, `RateLimitException` and `ValidationException`.
- `ChargeBackAbstract` base object with property type checking, required-field validation and
  array/JSON serialisation, backing the generic payload objects (order, transaction, card, billing,
  shipping, customer, product, alert, meta and related types).
- `Event` enum listing the webhook event types published by the API.
- `ChargeBackServiceProvider` with a publishable `config/chargeback.php` driven by
  `CHARGEBACK_ENABLED`, `CHARGEBACK_URL`, `CHARGEBACK_USERNAME` and `CHARGEBACK_PASSWORD`.
- Pest test suite with recorded API fixtures, and a CI workflow running Pint, PHPStan, Rector
  and the tests on PHP 8.2-8.4.

[Unreleased]: https://github.com/laratusk/chargebacks911/compare/v1.2.0...HEAD
[1.2.0]: https://github.com/laratusk/chargebacks911/compare/v1.1.0...v1.2.0
[1.1.0]: https://github.com/laratusk/chargebacks911/compare/v1.0.0...v1.1.0
[1.0.0]: https://github.com/laratusk/chargebacks911/releases/tag/v1.0.0
