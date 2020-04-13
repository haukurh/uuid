<?php

namespace Haukurh\Uuid;


class Uuid
{

    /**
     * time-based version.
     * @link https://tools.ietf.org/html/rfc4122#section-4.1.3
     */
    public const VERSION_1 = 1;

    /**
     * DCE Security version, with embedded POSIX UIDs.
     * @link https://tools.ietf.org/html/rfc4122#section-4.1.3
     */
    public const VERSION_2 = 2;

    /**
     * name-based version, that uses MD5 hashing.
     * @link https://tools.ietf.org/html/rfc4122#section-4.1.3
     */
    public const VERSION_3 = 3;

    /**
     * randomly or pseudo-randomly generated version.
     * @link https://tools.ietf.org/html/rfc4122#section-4.1.3
     */
    public const VERSION_4 = 4;

    /**
     * name-based version, that uses SHA-1 hashing.
     * @link https://tools.ietf.org/html/rfc4122#section-4.1.3
     */
    public const VERSION_5 = 5;

    /**
     * Name string is a fully-qualified domain name
     * @link https://tools.ietf.org/html/rfc4122#appendix-C
     */
    public const NAMESPACE_DNS = '6ba7b810-9dad-11d1-80b4-00c04fd430c8';

    /**
     * Name string is a URL
     * @link https://tools.ietf.org/html/rfc4122#appendix-C
     */
    public const NAMESPACE_URL = '6ba7b811-9dad-11d1-80b4-00c04fd430c8';

    /**
     * Name string is an ISO OID
     * @link https://tools.ietf.org/html/rfc4122#appendix-C
     */
    public const NAMESPACE_OID = '6ba7b812-9dad-11d1-80b4-00c04fd430c8';

    /**
     * Name string is an X.500 DN (in DER or a text output format)
     * @link https://tools.ietf.org/html/rfc4122#appendix-C
     */
    public const NAMESPACE_X500 = '6ba7b814-9dad-11d1-80b4-00c04fd430c8';


    /**
     * The low field of the timestamp
     * unsigned 32 bit integer
     * Octet: 0-3
     * @var $time_low
     * @link https://tools.ietf.org/html/rfc4122#section-4.1.2
     */
    public $time_low = 0x00000000;

    /**
     * The middle field of the timestamp
     * unsigned 16 bit integer
     * Octet: 4-5
     * @var $time_mid
     * @link https://tools.ietf.org/html/rfc4122#section-4.1.2
     */
    public $time_mid = 0x0000;

    /**
     * The high field of the timestamp multiplexed with the version number
     * unsigned 16 bit integer
     * Octet: 6-7
     * @var $time_hi_and_version
     * @link https://tools.ietf.org/html/rfc4122#section-4.1.2
     */
    public $time_hi_and_version = 0x0000;

    /**
     * The high field of the clock sequence multiplexed with the variant
     * unsigned 8 bit integer
     * Octet: 8
     * @var $clock_seq_hi_and_reserved
     * @link https://tools.ietf.org/html/rfc4122#section-4.1.2
     */
    public $clock_seq_hi_and_reserved = 0x00;

    /**
     * The low field of the clock sequence
     * unsigned 8 bit integer
     * Octet: 9
     * @var $clock_seq_low
     * @link https://tools.ietf.org/html/rfc4122#section-4.1.2
     */
    public $clock_seq_low  = 0x00;

    /**
     * The spatially unique node identifier
     * unsigned 48 bit integer
     * Octet: 10-15
     * @var $node
     * @link https://tools.ietf.org/html/rfc4122#section-4.1.2
     */
    public $node = 0x000000000000;

    protected $version;


    public function __construct(int $version, ?string $node = null, ?string $namespace = null)
    {
        $this->version = $version;
    }

    public function __toString(): string
    {
        return 'uuid' . $this->version;
    }

    public static function uuid1(string $node): Uuid
    {
        return new self(self::VERSION_1, $node);
    }

    public static function uuid3(string $ns, string $name): Uuid
    {
        return new self(self::VERSION_3, $name, $ns);
    }

    public static function uuid4(): Uuid
    {
        return new self(self::VERSION_4);
    }

    public static function uuid5(string $ns, string $name): Uuid
    {
        return new self(self::VERSION_5, $name, $ns);
    }
}
