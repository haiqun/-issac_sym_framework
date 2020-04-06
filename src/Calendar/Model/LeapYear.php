<?php
/**
 * Created by PhpStorm.
 * User: haiqunfan
 * Date: 2020/4/6
 * Time: 1:28 PM
 */
namespace Calendar\Model;

class LeapYear
{
    public function isLeapYear($year = null)
    {
        if (null === $year) {
            $year = date('Y');
        }

        return 0 == $year % 400 || (0 == $year % 4 && 0 != $year % 100);
    }
}