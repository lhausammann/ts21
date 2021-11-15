<?php


namespace App\Interpreter;


interface NodeInterface
{
    public function execute(array $context = null): mixed;
    public function __toString(): string;

    // generic stuff
    public function accept(VisitorInterface $visitor): mixed;

}