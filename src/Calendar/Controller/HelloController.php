<?php
/**
 * Created by PhpStorm.
 * User: haiqunfan
 * Date: 2020/4/7
 * Time: 4:05 PM
 */
namespace Calendar\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloController
{
    public function indexAction(Request $request,$name){
        $resp =  new Response();
        $data = [
            'code' => '1',
            'msg' => 'hello'+$name,
        ];

        $resp->setContent(json_encode($data));
        $resp->setStatusCode("201","hhh");
        return $resp;
    }
}