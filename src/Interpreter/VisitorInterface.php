<?php
namespace App\Interpreter;


interface VisitorInterface
{
    public function visitPlus(NodeInterface $node);
    public function visitMinus(NodeInterface $node);
    public function visitValue(NodeInterface $node);
}