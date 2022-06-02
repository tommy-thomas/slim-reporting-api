<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 10/24/2016
 * Time: 11:32 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="ProfessionalServiceType"))
 */
class ProfessionalServiceType extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $pkProfessionalServiceType;
    /**
     * @var string
     *
     * @SWG\Property(example="Editorial Board")
     *
     */
    public $ProfessionalServiceType;


    public function getpkProfessionalServiceTypeDataType() {
        return \PDO::PARAM_INT;
    }
    public function getProfessionalServiceTypeDataType() {
        return \PDO::PARAM_STR;
    }
}