<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 11/8/2016
 * Time: 11:30 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="ResearchLeaveType"))
 */
class ResearchLeaveType extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="2")
     *
     */
    public $pkResearchLeaveType;
    /**
     * @var string
     *
     * @SWG\Property(example="2Q")
     *
     */
    public $ResearchLeaveType;


    public function getpkResearchLeaveTypeDataType() {
        return \PDO::PARAM_INT;
    }
    public function getResearchLeaveTypeDataType() {
        return \PDO::PARAM_STR;
    }
}