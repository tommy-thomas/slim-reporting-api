<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 9/12/2016
 * Time: 9:36 AM
 */

namespace MyNameSpace\AnnualReport\Controllers;


class Controller
{
    protected $dao;
    protected $validator;

    public function __construct($app, $className)
    {
        $container = $app->getContainer();
        $this->dao = $container->get($className . 'DAO');
        $this->validator = $container->get('Validator');
    }

    public function __call($method, $arguments)
    {
        $request = $arguments[0];
        // Validate arguments.
        $raw_args = $request->isPost() ? $request->getParsedBody() : array_values($arguments[2]);
        $this->validator->validate($request, $raw_args, $this->dao, $method);
        if ($this->validator->failed()) {
            return print json_encode($this->validator->errors());
        }
        $params = $request->isPost() ? Parameters::getParamsForDAO($this->dao, $method, $raw_args) : $raw_args;
        $out = isset($this->dao) ? call_user_func_array(array($this->dao, $method), $params) : [];
        print $this->getOutPut($out);
    }

    public function getOutPut($out)
    {
        if ($out === false) {
            return json_encode(array("errors" => $out));
        }
        if (is_object($out) && isset($out->error_message)) {
            return json_encode(array("errors" => $out));
        }
        if (is_array($out) && !empty($out) && !is_object($out[0])) {
            return isset($out[0]['error_message']) ? json_encode(array("errors" => $out)) : json_encode(array("success" => $out));
        }
        return json_encode(array("success" => $out));
    }
}