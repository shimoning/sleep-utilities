<?php

namespace Shimoning\SleepUtils;

/**
 * sleep/usleep の発展系
 *
 * TODO: PHP7.3 以上のサポートにして microtime() から hrtime() に変更し精度を上げる
 * 現状だとミリ秒までの精度しか出ない
 *
 * @author Shimon Haga <shimon.haga@shimoning.com>
 */
class Sleep
{
    const KILO = 1e3;
    const MEGA = 1e6;
    const GIGA = 1e9;

    /**
     * 秒単位で処理を遅延させる (PHP 標準の sleep とほぼ同じ)
     *
     * @param int|float $t
     * @return void
     */
    public static function seconds($t)
    {
        $baseMicroSeconds = \microtime(true);
        $seconds = Tool::positiveFloat($t);
        self::usleep($seconds * self::MEGA, $baseMicroSeconds);
    }

    /**
     * ミリ秒単位で処理を遅延させる
     *
     * @param int|float $t
     * @return void
     */
    public static function milliSeconds($t)
    {
        $baseMicroSeconds = \microtime(true);
        $milliSeconds = Tool::positiveFloat($t);
        self::usleep($milliSeconds * self::KILO, $baseMicroSeconds);
    }

    /**
     * マイクロ秒単位で処理を遅延させる
     *
     * @param int|float $t
     * @return void
     */
    public static function microSeconds($t)
    {
        $baseMicroSeconds = \microtime(true);
        $microSeconds = Tool::positiveFloat($t);
        self::usleep($microSeconds, $baseMicroSeconds);
    }

    /**
     * ナノ秒単位で処理を遅延させる
     *
     * @param int|float $t
     * @return array|bool
     */
    public static function nanoSeconds($t)
    {
        $time = Tool::positiveFloat($t);
        $seconds = \floor($time / self::GIGA);
        $nanoSeconds = $time % self::GIGA;
        return \time_nanosleep($seconds, $nanoSeconds);
    }

    /**
     * usleep 互換
     * 精度を少し上げ、小数も引き受けるようにした
     *
     * @param float|int $microSeconds
     * @param float|null $baseTime
     * @return void
     */
    public static function usleep($microSeconds, float $baseMicroSeconds = null)
    {
        $targetSeconds = ($baseMicroSeconds ?: \microtime(true)) + $microSeconds / self::MEGA;

        if ($microSeconds > self::MEGA) {
            // システムによっては 1秒以上 をサポートしないことがある
            \sleep(\floor($microSeconds / self::MEGA));
        }

        while (($diffSeconds = $targetSeconds - \microtime(true)) > 0) {
            if ($diffSeconds < 0.001) {
                \usleep($diffSeconds * 5e5);
            }
        }
    }
}
