<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 10/13/2016
 * Time: 2:57 PM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="AdviseeRole"))
 */
class AdviseeRole extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="2")
     *
     */
    public $pkAdviseeRole;
    /**
     * @var string
     *
     * @SWG\Property(example="Chair")
     *
     */
    public $AdviseeRole;

    public function getpkAdviseeRoleDataType() {
        return \PDO::PARAM_INT;
    }
    public function getAdviseeRoleDataType() {
        return \PDO::PARAM_STR;
    }
}