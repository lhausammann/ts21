<?php


namespace App\Interpreter;


class Value implements NodeInterface
{

    public function __construct(private int|string|float $value) {
    }

    public function execute(array $context = null): mixed
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }
}