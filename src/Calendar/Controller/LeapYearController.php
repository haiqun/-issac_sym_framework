<?php
/**
 * Created by PhpStorm.
 * User: haiqunfan
 * Date: 2020/4/4
 * Time: 10:33 PM
 */
use Symfony\Component\HttpFoundation\Response;

class LeapYearController
{
    public function indexAction($year)
    {
        if (is_leap_year($year)) {
            return new Response('Yep, this is a leap year!');
        }

        return new Response('Nope, this is not a leap year.');
    }
}