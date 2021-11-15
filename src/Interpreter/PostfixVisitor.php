<?php


namespace App\Interpreter;


class PostfixVisitor implements VisitorInterface
{

    public function visitPlus(NodeInterface $node)
    {
        return sprintf('(%s,%s)+', $node->getLeft()->accept($this), $node->getRight()->accept($this));
    }

    public function visitMinus(NodeInterface $node)
    {
        return sprintf('(%s,%s)-', $node->getLeft()->accept($this), $node->getRight()->accept($this));
    }

    public function visitValue(NodeInterface $node)
    {
        return sprintf($node->getValue());
    }
}