<?php

namespace mihajlov;

class LinearEquation
{
    function solveLinear(float $b, float $c): array
    {
        if ($b == 0 && $c != 0)
        {
            throw new MihajlovException("Equation doesn't exist");
        }
        elseif($b == 0 && $c == 0)
        {
            trigger_error("Equations has infinite number of answers", E_USER_WARNING);
        }
        elseif ($c == 0)
        {
            return [0];
        }

        $this->X = ($c / $b);
        return [$this->X];
    }

    protected $X;
}