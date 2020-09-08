<?php

/**
 * @author    Naoya Yamashita
 * @copyright 2020 Naoya Yamashita
 * @license   MIT
 */
namespace InspireBBS;

require_once dirname(__DIR__) . '/vendor/autoload.php';

// エラーは漏らさず捕捉する
error_reporting(E_ALL | E_STRICT);

// カッコイイエラー画面を表示するための魔法の呪文
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

echo "こんにちはこんにちは";
