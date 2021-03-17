<?php


use PHPUnit\Framework\TestCase;
use mihajlov\QuadraticEquation;
use mihajlov\MihajlovException;

class QuadraticEquationTest extends TestCase
{
    private $solver;

    public function __construct(string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->solver = new QuadraticEquation();
    }

    function testSolveQuadratic()
    {
        // 4x^2 + 2x = 0
        $answer = $this->solver->solve(4, 2, 0);
        sort($answer);
        $expected = [-2, 0];

        $this->assertEquals($expected, $answer);
    }

    function testSecondArgumentZero()
    {
        // 4x^2 - 4 = 0
        $answer = $this->solver->solve(4, 0, -4);
        sort($answer);
        $expected = [-1, 1];

        $this->assertEquals($expected, $answer);
    }

    function testFirstArgumentZero()
    {
        // 10x - 4 = 0
        $answer = $this->solver->solve(0, 10, -4);
        sort($answer);
        $expected = [-0.4];

        $this->assertEquals($expected, $answer);
    }

    function testUnrealEquation()
    {
        $this->expectException(MihajlovException::class);
        // - 4 = 0
        $this->solver->solve(0, 0, -4);
    }

    function testBadDiscriminant()
    {
        $this->expectException(MihajlovException::class);
        $this->solver->solve(4, 2, 1);
    }
}
