<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 11/10/2016
 * Time: 4:10 PM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="AdviseeTotals"))
 */
class AdviseeTotals extends \Shared\DynamicGetterSetter {
    /**
     * @var int
     *
     * @SWG\Property(example="5")
     *
     */
    public $BATotal;
    /**
     * @var int
     *
     * @SWG\Property(example="6")
     *
     */
    public $MATotal;
    /**
     * @var int
     *
     * @SWG\Property(example="7")
     *
     */
    public $PHDTotal;
    /**
     * @var int
     *
     * @SWG\Property(example="8")
     *
     */
    public $PostDocTotal;
    /**
     * @var int
     *
     * @SWG\Property(example="9")
     *
     */
    public $MAPSSTotal;
    /**
     * @var int
     *
     * @SWG\Property(example="10")
     *
     */
    public $ChairTotal;
    /**
     * @var int
     *
     * @SWG\Property(example="11")
     *
     */
    public $ThreeYearBATotal;
    /**
     * @var int
     *
     * @SWG\Property(example="12")
     *
     */
    public $ThreeYearMATotal;
    /**
     * @var int
     *
     * @SWG\Property(example="14")
     *
     */
    public $ThreeYearPHDTotal;
    /**
     * @var int
     *
     * @SWG\Property(example="15")
     *
     */
    public $ThreeYearPostDocTotal;
    /**
     * @var int
     *
     * @SWG\Property(example="16")
     *
     */
    public $ThreeYearMAPSSTotal;
    /**
     * @var int
     *
     * @SWG\Property(example="17")
     *
     */
    public $ThreeYearChairTotal;
}