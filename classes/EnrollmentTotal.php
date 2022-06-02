<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 11/10/2016
 * Time: 4:10 PM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="EnrollmentTotal"))
 */
class EnrollmentTotal extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="20")
     *
     */
    public $UndergratuateEnrollmentTotal;
    /**
     * @var int
     *
     * @SWG\Property(example="30")
     *
     */
    public $GraduateEnrollmentTotal;
    /**
     * @var int
     *
     * @SWG\Property(example="40")
     *
     */
    public $TaughtTotal;
    /**
     * @var int
     *
     * @SWG\Property(example="50")
     *
     */
    public $RealBuyoutTotal;
}