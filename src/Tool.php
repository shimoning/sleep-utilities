<?php

namespace Shimoning\SleepUtils;

/**
 * 内部ツール
 *
 * @author Shimon Haga <shimon.haga@shimoning.com>
 */
class Tool
{
    /**
     * 乱数を生成する
     *
     * @param int $min
     * @param int $max
     * @return int
     */
    public static function random(int $min, int $max): int
    {
        $min = self::sanitize($min);
        $max = self::sanitize($max);
        return \function_exists('random_int')
            ? \random_int($min, $max)   // php >= 7.0
            : \mt_rand($min, $max);
    }

    /**
     * 値を1以上の非負の整数にする
     *
     * @param mixed $value
     * @return int
     */
    public static function sanitize($value)
    {
        if ($value < 0) { $value = 0; }
        return (int)$value;
    }
}
