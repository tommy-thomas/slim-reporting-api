<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/17/2016
 * Time: 12:47 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="HonorAndAward"))
 */
class HonorAndAward extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $pkHonorAward;
    /**
     * @var int
     *
     * @SWG\Property(example="8")
     *
     */
    public $fkReport;
    /**
     * @var int
     *
     * @SWG\Property(example="Fellow, American Academy of Arts and Sciences (inducted October, 2014)")
     *
     */
    public $AwardName;
    /**
     * @var int
     *
     * @SWG\Property(example="")
     *
     */
    public $AwardDescription;
    /**
     * @var boolean
     *
     * @SWG\Property(example="1")
     *
     */
    public $Active;
    /**
     * @var string
     *
     * @SWG\Property(example="2017-03-30 10:52:06")
     *
     */
    public $EditedDate;
    /**
     * @var string
     *
     * @SWG\Property(example="tommyt")
     *
     */
    public $EditedBy;


    public function getpkHonorAwardDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkReportDataType() {
        return \PDO::PARAM_INT;
    }
    public function getAwardNameDataType() {
        return \PDO::PARAM_STR;
    }
    public function getAwardDescriptionDataType() {
        return \PDO::PARAM_STR;
    }
    public function getActiveDataType() {
        return \PDO::PARAM_INT;
    }
    public function getEditedDateDataType() {
        return \PDO::PARAM_STR;
    }
    public function getEditedByDataType() {
        return \PDO::PARAM_STR;
    }
}