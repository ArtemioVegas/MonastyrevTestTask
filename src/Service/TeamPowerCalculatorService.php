<?php

namespace ArtemioVegas\MonastyrevTask\Service;

use ArtemioVegas\MonastyrevTask\Models\Team;
use ArtemioVegas\MonastyrevTask\Models\Power;

class TeamPowerCalculatorService
{
    /**
     * @var Team
     */
    private $team;

    /**
     * @var float
     */
    private $averageGoals;

    /**
     * TeamPowerCalculatorService constructor.
     * @param Team $team
     * @param float $averageGoals
     */
    public function __construct(Team $team, float $averageGoals)
    {
        $this->team = $team;
        $this->averageGoals = $averageGoals;
    }

    /**
     * @return float
     */
    private function getAttackPower(): float
    {
        return round($this->team->getScoredGoals() / $this->team->getGames() / $this->averageGoals, 2);
    }

    /**
     * @return float
     */
    private function getDefencePower(): float
    {
        return round($this->team->getSkipedGoals() / $this->team->getGames() / $this->averageGoals, 2);
    }

    /**
     * @return Power
     */
    public function getTeamPower(): Power
    {
        return new Power($this->getAttackPower(), $this->getDefencePower());
    }
}