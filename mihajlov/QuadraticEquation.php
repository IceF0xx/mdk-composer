<?php

namespace mihajlov;

use core\EquationInterface as EI;

class QuadraticEquation extends LinearEquation implements EI
{
    private function discriminant_sq($a, $b, $c): float
    {
        $discriminant = pow($b, 2) - 4 * $a * $c;
        if ($discriminant < 0) {
            throw new MihajlovException("Invalid quadratic eq: discriminant_sq is less than 0");
        }
        return sqrt($discriminant);
    }

    function solve($a, $b, $c): array
    {
        if ($a == 0) {
            return parent::solveLinear($b, $c);
        }

        $discriminant_sq = $this->discriminant_sq($a, $b, $c);

        if ($discriminant_sq === 0) {
            return [(-$b + $discriminant_sq) / 2 / $c];
        }

        if ($c === 0.) {
            $this->X = [0, -$b];
        } else {
            $this->X = [(-$b + $discriminant_sq) / 2 / $c,
                ($b + $discriminant_sq) / 2 / $c];
        }

        return $this->X;
    }
}