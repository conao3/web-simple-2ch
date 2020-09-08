<?php

/**
 * @author    Naoya Yamashita
 * @copyright 2020 Naoya Yamashita
 * @license   MIT
 */
namespace Simple2ch;

require_once dirname(__DIR__) . '/vendor/autoload.php';

// エラーは漏らさず捕捉する
error_reporting(E_ALL | E_STRICT);

// カッコイイエラー画面を表示するための魔法の呪文
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

echo "こんにちはこんにちは";

// 日本時間にセットしておく
date_default_timezone_set('Asia/Tokyo');
// 現在時刻のオブジェクト
$now = new \DateTimeImmutable;

// .env
$dotenv = new \Dotenv\Dotenv(dirname(__DIR__));
$dotenv->overload();
$dotenv->required('DB_DSN')->notEmpty();

// Twig
$basedir = dirname(__DIR__);
$loader = new \Twig_Loader_Filesystem($basedir . '/src/View/template');
$twig   = new \Twig_Environment($loader, [
    'cache' => $basedir . '/cache/twig',
    'debug' => true,
]);

// $twig->render()でテンプレートを文字列に出力する
// パラメータとして連想配列を渡してやると、テンプレート内で変数として利用できる
$content = $twig->render('index.tpl.html', [
    'greeting' => greeting($now),
]);

header('Content-Type: text/html; charset=utf-8');
header('Content-Length: ' . strlen($content));
echo $content;
