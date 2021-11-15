<?php


namespace App\Interpreter;


class MinusOperator extends AbstractOperator
{

    public function execute(array $context = null): mixed
    {
        return $this->left->execute() - $this->right->execute();
    }

    public function __toString(): string
    {
        return (string) $this->left . '-' . (string) $this->right;
    }
}