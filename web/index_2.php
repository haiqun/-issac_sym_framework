<?php
/**
 * Created by PhpStorm.
 * User: haiqunfan
 * Date: 2020/4/3
 * Time: 11:09 PM
 */

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;

// 创建全局请求
$request = Request::createFromGlobals();
// 引入路由配置
$routes = include __DIR__.'/../src/app.php';
// 文档链接 http://www.symfonychina.com/doc/current/components/routing.html
// 包含请求信息
$context = new Routing\RequestContext();
$context->fromRequest($request);
// 执行“把请求映射到单一路由”的操作
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

try {
    // 文档链接 http://www.symfonychina.com/doc/current/create_framework/routing.html
    //match()方法接收一个request路径，返回的是一个属性数组（attributes。注意被匹配的路由(之name）将自动地存在一个特殊的_route()属性中）：
//    print_r($request->getPathInfo());die; =》 地址：http://my_framework.local/hello?name=Fabientest 输出：/hello
    extract($matcher->match($request->getPathInfo()), EXTR_SKIP);
    ob_start();
    include sprintf(__DIR__.'/../src/pages/%s.php', $_route); // match 配置到的值  $_route
    $response = new Response(ob_get_clean());
} catch (Routing\Exception\ResourceNotFoundException $e) {
    $response = new Response('Not Found', 404);
} catch (Exception $e) {
    $response = new Response('An error occurred', 500);
}

$response->send();