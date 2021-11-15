<?php


namespace App\Interpreter;


abstract class AbstractOperator implements NodeInterface
{
    public function __construct(protected NodeInterface $left, protected NodeInterface $right)
    {
    }

    public function getLeft() {
        return $this->left;
    }

    public function getRight() {
        return $this->right;
    }

    public function accept(VisitorInterface $visitor): mixed {
        // depending on the class, determine the visitor call
        $parts = explode('\\', get_class($this));
        $class = array_pop($parts);
        $fn = 'visit' . str_replace( 'Operator', '', $class);
        return $visitor->$fn($this);
    }
}