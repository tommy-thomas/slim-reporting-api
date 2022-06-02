<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 10/24/2016
 * Time: 1:12 PM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="GrantFellowshipType"))
 */
class GrantFellowshipType extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $pkGrantFellowshipType;
    /**
     * @var int
     *
     * @SWG\Property(example="Internal: MyNameSpace")
     *
     */
    public $GrantFellowshipType;


    public function getpkGrantFellowshipTypeDataType() {
        return \PDO::PARAM_INT;
    }
    public function getGrantFellowshipTypeDataType() {
        return \PDO::PARAM_STR;
    }
}