<?php
/**
 * Created by PhpStorm.
 * User: haiqunfan
 * Date: 2020/4/7
 * Time: 5:02 PM
 */


use Symfony\Component\Routing;

/**
为了配置一个基本路由系统，你需要三部分内容：
一个 RouteCollection，包含路由定义（ Route 类的实例）
一个 RequestContext，包含请求信息
一个 UrlMatcher，执行“把请求映射到单一路由”的操作
 * */

// 包含路由定义
$routes = new Routing\RouteCollection();
$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', array(
    'year' => null,
    '_controller' => 'Calendar\\Controller\\LeapYearController::indexAction',
)));
$routes->add('hello',new Routing\Route('/hello/{name}',array(
    'name' => "world",
    '_controller' => 'Calendar\\Controller\\HelloController::indexAction',
)));

return $routes;

