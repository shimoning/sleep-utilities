<?php

namespace Shimoning\SleepUtils;

/**
 * sleep/usleep の発展系
 *
 * @author Shimon Haga <shimon.haga@shimoning.com>
 */
class RandomSleep
{
    /**
     * 秒単位でランダムに処理を遅延させる
     *
     * @param integer $min
     * @param integer $max
     * @return void
     */
    public static function seconds(int $min, int $max)
    {
        Sleep::seconds(Tool::random($min, $max));
    }

    /**
     * ミリ秒単位でランダムに処理を遅延させる
     *
     * @param integer $min
     * @param integer $max
     * @return void
     */
    public static function milliSeconds(int $min, int $max)
    {
        Sleep::milliSeconds(Tool::random($min, $max));
    }

    /**
     * マイクロ秒単位でランダムに処理を遅延させる
     *
     * @param integer $min
     * @param integer $max
     * @return void
     */
    public static function microSeconds(int $min, int $max)
    {
        Sleep::microSeconds(Tool::random($min, $max));
    }

    /**
     * ナノ秒単位でランダムに処理を遅延させる
     *
     * @param integer $min
     * @param integer $max
     * @return void
     */
    public static function nanoSeconds(int $min, int $max)
    {
        Sleep::nanoSeconds(Tool::random($min, $max));
    }
}
