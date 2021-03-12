<?php

namespace mihajlov;
use InvalidArgumentException;

class LinearEquation
{
    function solveLinear($b, $c): array
    {
        if ($b === 0) {
            throw new InvalidArgumentException("Equation doesn't exist");
        }


        $this->X = -($b * $c);
        return [$this->X];
    }

    protected $X;
}