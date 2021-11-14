<?php


namespace App\Interpreter;


interface NodeInterface
{
    public function execute(array $context = null): mixed;
    public function __toString(): string;

}