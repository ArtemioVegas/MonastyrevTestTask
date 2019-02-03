<?php
require_once __DIR__ . '/vendor/autoload.php';

use ArtemioVegas\MonastyrevTask\Service\TeamsProvider;
use ArtemioVegas\MonastyrevTask\Service\TeamPowerCalculatorService;
use ArtemioVegas\MonastyrevTask\Service\Helper;

/**
 * @param int $firstTeam
 * @param int $secondTeam
 * @return array
 * @throws \ArtemioVegas\MonastyrevTask\Exception\TeamNotFoundException
 * @throws RuntimeException
 */
function match(int $firstTeam, int $secondTeam) : array
{
    if ($firstTeam == $secondTeam) {
        throw new RuntimeException('command ids should not be equal');
    }
    $teamsGetterService = TeamsProvider::getInstance(require_once 'data.php');
    $averageGoals = $teamsGetterService->getAverageGoalsScoredPerGame();

    $firstTeamPower = (new TeamPowerCalculatorService(
        $teamsGetterService->getTeamById($firstTeam),
        $averageGoals
        )) -> getTeamPower();

    $secondTeamPower = (new TeamPowerCalculatorService(
        $teamsGetterService->getTeamById($secondTeam),
        $averageGoals
        )) -> getTeamPower();

    $lambdaFirstTeam =  $firstTeamPower->getAttackPower()  * $secondTeamPower->getDefencePower() * $averageGoals;
    $lambdaSecondTeam = $secondTeamPower->getAttackPower() * $firstTeamPower->getDefencePower()  * $averageGoals;

    return [Helper::calculateScoredGoals($lambdaFirstTeam), Helper::calculateScoredGoals($lambdaSecondTeam)];
}