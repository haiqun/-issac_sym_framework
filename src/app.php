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

function is_leap_year($year = null) {
    if (null === $year) {
        $year = date('Y');
    }
    return 0 === $year % 400 || (0 === $year % 4 && 0 !== $year % 100);
}

// 包含路由定义
$routes = new Routing\RouteCollection();
$routes->add('hello', new Routing\Route('/hello/{name}', array(
    'name' => 'World',
    '_controller' => function ($request) {
        // $foo 可用于模板中
        $request->attributes->set('foo', 'bar');
        $response = render_template($request);
        // change some header 修改头信息
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }
))); // 这种参数格式是 xx.com/hello/name123 => name=name123 如果不传就是 World
// add ("模板文件名","请求的url地址")
$routes->add('bye', new Routing\Route('/bye'));
$routes->add('test', new Routing\Route('/test')); // /test?test=world => 参数传递方式是 ?xxx=aaa
// 判断是否是润年
//$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', array(
//    'year' => null,
//    '_controller' => function ($request) {
//        if (is_leap_year($request->attributes->get('year'))) {
//            $request->attributes->set('info', 'Yep, this is a leap year!');
//        }else{
//            $request->attributes->set('info', 'Nope, this is not a leap year.');
//        }
//        $response = render_template($request);
//        return $response;
//    }
//)));
# 第二版
//$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', array(
//    'year' => null,
//    '_controller' => array(new LeapYearController(), 'indexAction'),
//)));
# 第三版
include_once __DIR__.'/Controller/LeapYearController.php';
$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', array(
    'year' => null,
    '_controller' => 'LeapYearController::indexAction',
)));
return $routes;
