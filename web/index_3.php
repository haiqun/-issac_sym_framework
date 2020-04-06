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
    $request->attributes->add($matcher->match($request->getPathInfo()));
    // call_user_func 把第一个参数作为回调函数调用
    $render_template = $request->attributes->get('_controller') ?? 'render_template';
    $response = call_user_func($render_template, $request);
} catch (Routing\Exception\ResourceNotFoundException $e) {
    $response = new Response('Not Found', 404);
} catch (Exception $e) {
    $response = new Response('An error occurred', 500);
}
function render_template($request)
{
//    print_r($request->attributes->all());die;
    extract($request->attributes->all(), EXTR_SKIP); // $request->attributes->all() 获取的不只是http的参数，还有设置好的属性
    ob_start();
    include sprintf(__DIR__.'/../src/pages/%s.php', $_route);
    return new Response(ob_get_clean());
}

$response->send();

