<?php
/**
 * Created by PhpStorm.
 * User: haiqunfan
 * Date: 2020/4/3
 * Time: 11:09 PM
 */

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;

$request = Request::createFromGlobals();
$routes = include __DIR__.'/../src/app.php';

$context = new Routing\RequestContext();
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

$controllerResolver = new ControllerResolver();
$argumentResolver = new ArgumentResolver();

$framework = new Simplex\Framework($matcher, $controllerResolver, $argumentResolver);
$response = $framework->handle($request);

$response->send();