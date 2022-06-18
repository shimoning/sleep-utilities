<?php

namespace Shimoning\SleepUtils;

/**
 * sleep/usleep の発展系
 *
 * @author Shimon Haga <shimon.haga@shimoning.com>
 */
class Sleep
{
    const KILO = 1000;
    const MEGA = 1000000;
    const GIGA = 1000000000;

    /**
     * 秒単位で処理を遅延させる (PHP 標準の sleep とほぼ同じ)
     *
     * @param int $t
     * @return int
     */
    public static function seconds(int $t)
    {
        return \sleep(Tool::sanitize($t));
    }

    /**
     * ミリ秒単位で処理を遅延させる
     *
     * @param int $t
     * @return void
     */
    public static function milliSeconds(int $t)
    {
        $time = Tool::sanitize($t);
        if ($time > self::KILO) {
            // システムによっては 1秒以上 をサポートしないことがある
            self::seconds(\floor($time / self::KILO));
            $time %= self::KILO;
        }
        return \usleep($time * self::KILO);
    }

    /**
     * マイクロ秒単位で処理を遅延させる
     *
     * @param int $t
     * @return void
     */
    public static function microSeconds(int $t)
    {
        $time = Tool::sanitize($t);
        if ($time > self::MEGA) {
            // システムによっては 1秒以上 をサポートしないことがある
            self::seconds(\floor($time / self::MEGA));
            $time %= self::MEGA;
        }
        return \usleep($time);
    }

    /**
     * ナノ秒単位で処理を遅延させる
     *
     * @param int $t
     * @return array|bool
     */
    public static function nanoSeconds(int $t)
    {
        $time = Tool::sanitize($t);
        $seconds = \floor($time / self::GIGA);
        $nanoseconds = $time % self::GIGA;
        return \time_nanosleep($seconds, $nanoseconds);
    }

    /**
     * 小数が含まれる秒単位で処理を遅延させる
     *
     * @param int|float $t
     * @return void
     */
    public static function decimalSeconds($t)
    {
        if (! \is_numeric($t) || $t < 0) {
            // 数値じゃない、もしくは負の時は何もしない
            return;
        }

        if (\is_int($t)) {
            // 整数の場合
            self::seconds($t);
            return;
        }

        // float の場合
        $time = (float)$t;
        $seconds = \floor($time);
        $nanoseconds = \floor(($time - $seconds) * self::GIGA);
        \time_nanosleep($seconds, $nanoseconds);
    }
}
