<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 10/12/2016
 * Time: 9:59 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="ResidentStatusType"))
 */
class ResidentStatusType extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="2")
     *
     */
    public $pkResidentStatusType;
    /**
     * @var int
     *
     * @SWG\Property(example="Out of Residence: Research Leave")
     *
     */
    public $ResidentStatusType;
    /**
     * @var int
     *
     * @SWG\Property(example="Leave: Research")
     *
     */
    public $ResidentStatusTypeHistorical;


    public function getpkResidentStatusTypeDataType() {
        return \PDO::PARAM_INT;
    }
    public function getResidentStatusTypeDataType() {
        return \PDO::PARAM_STR;
    }
    public function getResidentStatusTypeHistoricalDataType() {
        return \PDO::PARAM_STR;
    }
}