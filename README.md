# haukurh/uuid

A PHP library for generating RFC 4122 complaint universally unique identifier (UUID).

## Basic usage

Since most common implementation, demand just an simple way to generate the uuid.
Therefor some helpful functions have been provided to do just that.

```php
<?php

require 'vendor/autoload.php';

use Haukurh\Uuid\Uuid;
use function Haukurh\Uuid\uuid5;

$uuid = uuid5(Uuid::NAMESPACE_URL, 'https://haukurh.is');

// do something with the uuid...

```

## Resources

- [tools.ietf.org: rfc4122](https://tools.ietf.org/html/rfc4122)
