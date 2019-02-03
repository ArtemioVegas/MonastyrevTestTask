<?php

namespace ArtemioVegas\MonastyrevTask\Service;

use ArtemioVegas\MonastyrevTask\Models\Team;
use ArtemioVegas\MonastyrevTask\Exception\TeamNotFoundException;

class TeamsProvider
{
    /** @var Team[] $teams  */
    private $teams;
    /** @var TeamsProvider $instance */
    private static $instance;

    /**
     * @param array|null $data
     * @return TeamsProvider
     */
    public static function getInstance(array $data = null)
    {
        if (!self::$instance) {
            self::$instance = new self($data);
        }
        return self::$instance;
    }
    /**
     * @param int $index
     * @return Team
     * @throws TeamNotFoundException
*/
    public function getTeamById(int $index)
    {
        if ( !isset($this->teams[$index]) ) {
            throw new TeamNotFoundException('Not found Team`s by passed id');
        }
        return $this->teams[$index];
    }

    /**
     * @return float
     */
    public function getAverageGoalsScoredPerGame(): float
    {
        $totalTeamsGoalsScored = 0;
        $totalTeamsGames = 0;
        /**
         * @var Team $team
         */
        foreach ($this->teams as $team)
        {
            $totalTeamsGoalsScored += $team->getScoredGoals();
            $totalTeamsGames += $team->getGames();
        }
        return round($totalTeamsGoalsScored / $totalTeamsGames, 2);
    }

    /**
     * TeamsProvider constructor.
     * @param array $data
     */
    private function __construct(array $data)
    {
        foreach ($data as $index => $datum) {
            $team = new Team($datum);
            $this->teams[$index] = $team;
        }
    }
}