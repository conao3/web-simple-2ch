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
