<?php
use PHPUnit\Framework\TestCase;
use App\Interpreter\PlusOperator;
use App\Interpreter\Value;

class OperatorTest extends TestCase
{
    public function testPlusTwoOperands() {
        $left = new Value('7');
        $right = new Value('8');
        $tree = new PlusOperator($left, $right);
        $this->assertEquals('7+8', (string) $tree);
        $this->assertEquals('15', $tree->execute());
    }

    public function testPlusThreeOperands() {
        // 7 + 8 + 9
        $left = new Value(7);
        $right = new PlusOperator(new Value(8), new Value(9));
        $tree = new PlusOperator($left, $right);
        $this->assertEquals('7+8+9', (string) $tree);
        $this->assertEquals(7+8+9, $tree->execute());
    }
}