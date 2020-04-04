<?php
/**
 * Created by PhpStorm.
 * User: haiqunfan
 * Date: 2020/4/4
 * Time: 12:07 AM
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
$routes->add('hello', new Routing\Route('/hello/{name}', array('name' => 'World')));
$routes->add('bye', new Routing\Route('/bye'));
$routes->add('test', new Routing\Route('/test/{name}', array('test' => 'World12312')));

return $routes;