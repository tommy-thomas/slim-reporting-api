<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 10/26/2016
 * Time: 9:48 AM
 */

namespace MyNameSpace\AnnualReport\Controllers;


class Parameters
{
    public static function getParamsForDAO( $dao, $method , $args)
    {
        $params = [];
        $class = new \ReflectionClass($dao);
        $tmpMethod = $class->getMethod($method);
        $i = 0;
        foreach( $tmpMethod->getParameters() as $param )
        {
            $params[$i] = isset($args[$param->getName()]) ? $args[$param->getName()] : '';
            $i++;
        }
        return $params;
    }
}