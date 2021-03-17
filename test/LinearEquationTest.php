<?php


use mihajlov\MihajlovException;
use PHPUnit\Framework\TestCase;
use mihajlov\LinearEquation;

class LinearEquationTest extends TestCase
{
    private $solver;

    public function __construct(string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->solver = new LinearEquation();
    }

    function testSolveLinear()
    {
        $this->solver = new LinearEquation();

        // 2x + 2 = 0
        $answer = $this->solver->solveLinear(2, 2);
        $expectedAnswer = [1];

        $this->assertEquals($expectedAnswer, $answer);
    }

    function testException()
    {
        $this->expectException(MihajlovException::class);
        $this->solver->solveLinear(0, 2);
    }

    function testZeroC()
    {
        $answer = $this->solver->solveLinear(4, 0);
        $expected = [0];
        $this->assertEquals($expected, $answer);
    }

    function testInfiniteNumberOfAnswers()
    {
        $this->expectWarning();
        $this->solver->solveLinear(0, 0);
    }
}
