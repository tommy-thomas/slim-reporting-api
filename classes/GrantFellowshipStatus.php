<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 10/24/2016
 * Time: 1:07 PM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="GrantFellowshipStatus"))
 */
class GrantFellowshipStatus extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $pkGrantFellowshipStatus;
    /**
     * @var string
     *
     * @SWG\Property(example="Proposal in development.")
     *
     */
    public $GrantFellowshipStatus;


    public function getpkGrantFellowshipStatusDataType() {
        return \PDO::PARAM_INT;
    }
    public function getGrantFellowshipStatusDataType() {
        return \PDO::PARAM_STR;
    }
}