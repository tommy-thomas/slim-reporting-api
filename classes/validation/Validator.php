<?php

namespace MyNameSpace\AnnualReport\Validation;

use Respect\Validation\Exceptions\NestedValidationException;


class Validator
{
    protected $errors = [];

    public function validate( $request , $args, $dao, $method ){
        $request->isPost() ? $this->checkAllParamsSet($dao, $args, $method) : '';
        $rules = Rules::getRules( $request->getUri()->getPath()  ); // base path
        foreach( $rules as $key=>$rule)
        {
            try {
                isset($args[$key]) ? $rule->assert( $args[$key] ): '';
            } catch( NestedValidationException $e) {
                $this->errors[$key] = $e->getMessages();
            }
        }
        return $this;
    }

    public function checkAllParamsSet( $dao, $args, $method)
    {
        $class = new \ReflectionClass($dao);
        $tmpMethod = $class->getMethod($method);
        foreach( $tmpMethod->getParameters() as $param )
        {
            !isset($args[$param->name]) ? array_push($this->errors, 'Missing argument: '. $param->name ) : '';
        }
        return $this;
    }

    public function errors()
    {
        return array('errors' => $this->errors);
    }

    public function failed()
    {
        return !empty( $this->errors );
    }
}