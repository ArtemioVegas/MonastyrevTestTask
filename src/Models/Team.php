<?php

namespace ArtemioVegas\MonastyrevTask\Models;

use ArtemioVegas\MonastyrevTask\Models\Goals;
use Respect\Validation\Validator;

class Team {
    /** @var string */
    private $name;
    /** @var int */
    private $games;
    /** @var int */
    private $win;
    /** @var int */
    private $draw;
    /** @var int */
    private $defeat;
    /** @var Goals */
    private $goals;

    /**
     * Team constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        Validator::keySet(
            Validator::key("name", Validator::stringType()),
            Validator::key("games", Validator::intType()),
            Validator::key("win", Validator::intType()),
            Validator::key("draw", Validator::intType()),
            Validator::key("defeat", Validator::intType()),
            Validator::key("goals", Validator::arrayType())
        )->check($data);

        foreach ($data as $name => $value){
            if ($name === "goals") {
                $this->goals = new Goals($data[$name]);
                continue;
            }
            $this->{$name} = $value;
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getGames(): int
    {
        return $this->games;
    }

    /**
     * @return int
     */
    public function getWin(): int
    {
        return $this->win;
    }

    /**
     * @return int
     */
    public function getDraw(): int
    {
        return $this->draw;
    }

    /**
     * @return int
     */
    public function getDefeat(): int
    {
        return $this->defeat;
    }

    /**
     * @return Goals
     */
    public function getGoals(): Goals
    {
        return $this->goals;
    }

    /**
     * @return int
     */
    public function getSkipedGoals() : int
    {
        return $this->goals->getSkiped();
    }

    /**
     * @return int
     */
    public function getScoredGoals() : int
    {
        return $this->goals->getScored();
    }
}