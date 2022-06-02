<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 10/12/2016
 * Time: 1:12 PM
 */

namespace MyNameSpace\AnnualReport;


/**
 * @SWG\Definition(type="object", @SWG\Xml(name="AdminAccessLevel"))
 */
class AdminAccessLevel extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $pkAdminAccessLevel;
    /**
     * @var string
     *
     * @SWG\Property(example="Division")
     *
     */
    public $AdminAccessLevel;


    public function getpkAdminAccessLevelDataType() {
        return \PDO::PARAM_INT;
    }
    public function getAdminAccessLevelDataType() {
        return \PDO::PARAM_STR;
    }
}