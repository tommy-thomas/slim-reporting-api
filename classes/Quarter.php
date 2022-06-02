<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 11/8/2016
 * Time: 11:16 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="Quarter"))
 */
class Quarter extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="2")
     *
     */
    public $pkQuarter;
    /**
     * @var string
     *
     * @SWG\Property(example="Autumn")
     *
     */
    public $Quarter;


    public function getpkQuarterDataType() {
        return \PDO::PARAM_INT;
    }
    public function getQuarterDataType() {
        return \PDO::PARAM_STR;
    }
}