<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 10/17/2016
 * Time: 10:00 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="AdviseeMAType"))
 */
class AdviseeMAType extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $pkAdviseeMAType;
    /**
     * @var string
     *
     * @SWG\Property(example="Departmental MA")
     *
     */
    public $AdviseeMAType;


    public function getpkAdviseeMATypeDataType() {
        return \PDO::PARAM_INT;
    }
    public function getAdviseeMATypeDataType() {
        return \PDO::PARAM_STR;
    }
}