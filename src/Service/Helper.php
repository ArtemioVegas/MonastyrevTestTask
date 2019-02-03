<?php

namespace ArtemioVegas\MonastyrevTask\Service;

class Helper
{
    const MAX_GOALS_COUNT = 10;
    /**
     * @param int $number
     * @return int
     */
    public static function factorial(int $number) : int
    {
        if ($number < 2) {
            return 1;
        } else {
            return ($number * self::factorial($number-1));
        }
    }

    /**
     * @param float $chance
     * @param int $occurrence
     * @return float
     */
    public static function poisson(float $chance, int $occurrence) : float
    {
        $e = exp(1);

        $a = pow($e, (-1 * $chance));
        $b = pow($chance,$occurrence);
        $c = self::factorial($occurrence);

        return $a * $b / $c;
    }

    /**
     * @return float
     */
    public static function random(): float {
        return (float) rand() / (float) getrandmax();
    }

    /**
     * @param float $lambda
     * @return int
     */
    public static function calculateScoredGoals( float $lambda ): int
    {
        $goals = 0;
        if ( (bool) $lambda ) {
            $sumP            = 0;
            $arProbabilities = [];
            for ( $i = 0; $i < Helper::MAX_GOALS_COUNT; $i ++ ) {
                $probability           = self::poisson( $lambda, $i );
                $arProbabilities[ $i ] = $probability;
                $sumP                  += $probability;
            }
            $r = Helper::random() * $sumP;
            for ( $i = 0; $i < count( $arProbabilities ); $i ++ ) {
                if ( $r > $arProbabilities[ $i ] ) {
                    $r -= $arProbabilities[ $i ];
                } else {
                    $goals = $i;
                    break;
                }
            }
        }
        return $goals;
    }
}