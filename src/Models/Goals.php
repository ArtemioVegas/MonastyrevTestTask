<?php

namespace ArtemioVegas\MonastyrevTask\Models;

use Respect\Validation\Validator;

class Goals
{
    /** @var int */
    private $scored;

    /** @var int */
    private $skiped;

    /**
     * Goals constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        Validator::keySet(
            Validator::key('scored', Validator::intType()),
            Validator::key('skiped', Validator::intType())
        )->check($data);
        $this->scored =  $data['scored'];
        $this->skiped =  $data['skiped'];
    }

    /**
     * @return int
     */
    public function getScored(): int
    {
        return $this->scored;
    }

    /**
     * @return int
     */
    public function getSkiped(): int
    {
        return $this->skiped;
    }
}