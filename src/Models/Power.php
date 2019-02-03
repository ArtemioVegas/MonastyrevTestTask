<?php

namespace ArtemioVegas\MonastyrevTask\Models;

class Power
{
    /**
     * @var float
     */
    private $attackPower;

    /**
     * @var float
     */
    private $defencePower;

    /**
     * Power constructor.
     * @param float $attackPower
     * @param float $defencePower
     */
    public function __construct(float $attackPower, float $defencePower)
    {
        $this->attackPower = $attackPower;
        $this->defencePower = $defencePower;
    }

    /**
     * @return float
     */
    public function getAttackPower(): float
    {
        return $this->attackPower;
    }

    /**
     * @return float
     */
    public function getDefencePower(): float
    {
        return $this->defencePower;
    }
}