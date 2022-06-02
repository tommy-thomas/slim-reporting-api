<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 11/10/2016
 * Time: 4:10 PM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="PublicationTotal"))
 */
class PublicationTotal extends \Shared\DynamicGetterSetter {

    /**
     * @var string
     *
     * @SWG\Property(example="2016 - 17")
     *
     */
    public $AcademicYear;
    /**
     * @var string
     *
     * @SWG\Property(example="Article")
     *
     */
    public $PublicationType;
    /**
     * @var string
     *
     * @SWG\Property(example="A Field Experiment on the Impact of Incentives on Milk Choice in the School Lunchroom")
     *
     */
    public $PublicationTitle;
    /**
     * @var string
     *
     * @SWG\Property(example="Published")
     *
     */
    public $PublicationStatusType;
}