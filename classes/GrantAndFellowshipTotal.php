<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 11/10/2016
 * Time: 4:10 PM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="GrantAndFellowshipTotal"))
 */
class GrantAndFellowshipTotal extends \Shared\DynamicGetterSetter {

    /**
     * @var string
     *
     * @SWG\Property(example="2017 - 18")
     *
     */
    public $AcademicYear;
    /**
     * @var string
     *
     * @SWG\Property(example="NEH, National Endowment for the Humanities")
     *
     */
    public $FundingAgency;
    /**
     * @var string
     *
     * @SWG\Property(example="Summer Seminar, “Invisible Hands: The Enlightenment Science of Society.")
     *
     */
    public $ProjectTitle;
    /**
     * @var string
     *
     * @SWG\Property(example="110000,")
     *
     */
    public $TotalAmountAwarded;
}