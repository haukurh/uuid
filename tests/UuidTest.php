<?php

declare(strict_types=1);

use Haukurh\Uuid\Uuid;
use PHPUnit\Framework\TestCase;

use function Haukurh\Uuid\uuid3;
use function Haukurh\Uuid\uuid5;

final class UuidTest extends TestCase
{
    public function testUuidVersion3(): void
    {
        $uuidUrl = uuid3(Uuid::NAMESPACE_URL, 'https://haukurh.is');
        $this->assertEquals('b4ac6546-0fd2-3471-97d0-c4c13cecad6c', $uuidUrl);

        $uuidDns = uuid3(Uuid::NAMESPACE_DNS, 'haukurh.is');
        $this->assertEquals('c3059dee-b8a2-32d8-973a-f59c89ae31b3', $uuidDns);
    }

    public function testUuidVersion5(): void
    {
        $uuidUrl = uuid5(Uuid::NAMESPACE_URL, 'https://haukurh.is');
        $this->assertEquals('30dd3bc2-c6cf-568c-a277-8422636d2dc5', $uuidUrl);

        $uuidDns = uuid5(Uuid::NAMESPACE_DNS, 'haukurh.is');
        $this->assertEquals('c208e1e9-3524-5d34-b4ad-884cd3abc7aa', $uuidDns);
    }
}
