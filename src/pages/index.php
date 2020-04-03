<?php
/**
 * Created by PhpStorm.
 * User: haiqunfan
 * Date: 2020/4/3
 * Time: 2:00 PM
 */

$input = $request->get('name', 'World');
// 分别取出GET和POST变量
//$b = $request->query->get('foo');
//$a = $request->request->get('bar', 'default value if bar does not exist');
$method = $request->getMethod();
$ip = $request->getClientIp();

$response = $response->setContent(sprintf('Hello %s , 当前请求方法是 %s , ip : %s', htmlspecialchars($input, ENT_QUOTES, 'UTF-8'),$method,$ip));
$response->send();


