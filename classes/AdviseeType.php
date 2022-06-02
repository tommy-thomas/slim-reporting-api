<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 10/17/2016
 * Time: 10:30 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="AdviseeType"))
 */
class AdviseeType extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $pkAdviseeType;
    /**
     * @var string
     *
     * @SWG\Property(example="BA")
     *
     */
    public $AdviseeType;


    public function getpkAdviseeTypeDataType() {
        return \PDO::PARAM_INT;
    }
    public function getAdviseeTypeDataType() {
        return \PDO::PARAM_STR;
    }
}