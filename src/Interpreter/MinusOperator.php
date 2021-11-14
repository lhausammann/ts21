<?php


namespace App\Interpreter;


class MinusOperator implements NodeInterface
{

    public function __construct(private NodeInterface $left, private NodeInterface $right) {}

    public function execute(array $context = null): mixed
    {
        return $this->left->execute() - $this->right->execute();
    }

    public function __toString(): string
    {
        return (string) $this->left . '-' . (string) $this->right;
    }
}