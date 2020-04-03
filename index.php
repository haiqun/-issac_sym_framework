<?php
/**
 * Created by PhpStorm.
 * User: haiqunfan
 * Date: 2020/4/3
 * Time: 2:00 PM
 */

require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$input = $request->get('name', 'World');

// 分别取出GET和POST变量
//$b = $request->query->get('foo');
//$a = $request->request->get('bar', 'default value if bar does not exist');
$method = $request->getMethod();

$ip = $request->getClientIp();


$response = new Response(sprintf('Hello %s , 当前请求方法是 %s , ip : %s', htmlspecialchars($input, ENT_QUOTES, 'UTF-8'),$method,$ip));
$response->send();


