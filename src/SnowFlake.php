<?php
/*
 * @Description    : 生成全局唯一ID
 * @Version        : 1.0.0
 * @Author         : QianLong
 * @Date           : 2019-12-30 14:00:28
 * @LastEditors    : QianLong
 * @LastEditTime   : 2019-12-30 14:02:38
 */

namespace Qianlong\SnowFlake;

class SnowFlake
{
    const EPOCH = 1546272100000; //开始时间,固定一个小于当前时间的毫秒数\
    const max12bit = 4095;
    const max41bit = 1099511627775;
    static $machineId = null; // 机器id
    public static function machineId($mId = 1000000001)
    {
        self::$machineId = $mId;
    }

    public static function createId($prefix = '')
    {
        $time = floor(microtime(true) * 1000);
        $time -= self::EPOCH;
        $base = decbin(self::max41bit + $time);
        if (!self::$machineId) {
            $machineid = self::$machineId;
        } else {
            $machineid = str_pad(decbin(self::$machineId), 10, "0", STR_PAD_LEFT);
        }
        $random = str_pad(decbin(mt_rand(0, self::max12bit)), 12, "0", STR_PAD_LEFT);
        $base = $base . $machineid . $random;
        return $prefix.bindec($base);
    }
}

