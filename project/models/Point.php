<?php

namespace models;

class Point
{
    private float $x;
    private float $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX() : float
    {
        return $this->x;
    }

    public function getY() : float
    {
        return $this->y;
    }

    public function setX($x) : void
    {
        $this->x = $x;
    }

    public function setY($y) : void
    {
        $this->y = $y;
    }
}