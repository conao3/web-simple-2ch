<?php
/**
 * @author    Naoya Yamashita
 * @copyright 2020 Naoya Yamashita
 * @license   MIT
 */

/**
 * @return \PDO
 */
function db()
{
    static $db;

    if (!$db) {
        $db = new \PDO(getenv('DB_DSN'), null, null, [PDO::ATTR_PERSISTENT => true]);
    }

    return $db;
}

/**
 * @return string
 */
function greeting(\DateTimeInterface $dt)
{
    $hour = (int)$dt->format('H');

    if (4 <= $hour && $hour < 10) {
        return "お早うございます";
    }
    if (10 <= $hour && $hour < 17) {
        return "こんにちは";
    }

    return "こんばんわ";
}
