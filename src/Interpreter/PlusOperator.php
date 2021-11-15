<?php


namespace App\Interpreter;


class PlusOperator extends AbstractOperator
{

    public function execute(array $context = null): mixed
    {
        return $this->left->execute() + $this->right->execute();
    }

    public function __toString(): string
    {
        return sprintf('%s+%s', (string) $this->left, (string) $this->right);
    }
}