<?php
use PHPUnit\Framework\TestCase;
use App\Interpreter\PlusOperator;
use App\Interpreter\Value;
use \App\Interpreter\PostfixVisitor;
use App\Interpreter\PrefixVisitor;

class OperatorTest extends TestCase
{
    public function test7plus8()
    {
        $left = new Value('7');
        $right = new Value('8');
        $tree = new PlusOperator($left, $right);
        $this->assertEquals('7+8', (string) $tree);
        $this->assertEquals('15', $tree->execute());
    }

    public function test7plus8plus9()
    {
        // 7 + 8 + 9
        $left = new Value(7);
        $right = new PlusOperator(new Value(8), new Value(9));
        $tree = new PlusOperator($left, $right);
        $this->assertEquals('7+8+9', (string) $tree);
        $this->assertEquals(7+8+9, $tree->execute());
    }

    public function test7plus8plus9Prefix()
    {
        // 7 + 8 + 9
        $left = new Value(7);
        $right = new PlusOperator(new Value(8), new Value(9));
        $tree = new PlusOperator($left, $right);
        $visitor = new PostfixVisitor();
        $visitorResult = $tree->accept($visitor);
        $this->assertEquals('7+8+9', (string) $tree);
        $this->assertEquals(7+8+9, $tree->execute());
        $this->assertEquals('(7,(8,9)+)+', $visitorResult);
    }

    public function test7plus8plus9PostFix()
    {
        // 7 + 8 + 9
        $left = new Value(7);
        $right = new PlusOperator(new Value(8), new Value(9));
        $tree = new PlusOperator($left, $right);
        $visitor = new PrefixVisitor();
        $visitorResult = $tree->accept($visitor);
        $this->assertEquals('7+8+9', (string) $tree);
        $this->assertEquals(7+8+9, $tree->execute());
        $this->assertEquals('+(7,+(8,9))', $visitorResult);
    }
}