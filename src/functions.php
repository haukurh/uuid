<?php
declare(strict_types=1);

namespace Haukurh\Uuid;

function uuid1(string $node): string
{
    return (string) Uuid::uuid1($node);
}

function uuid3(string $ns, string $name): string
{
    return (string) Uuid::uuid3($ns, $name);
}

function uuid4(): string
{
    return (string) Uuid::uuid4();
}

function uuid5(string $ns, string $name): string
{
    return (string) Uuid::uuid5($ns, $name);
}
