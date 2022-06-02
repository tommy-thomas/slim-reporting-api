<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 11/15/2016
 * Time: 11:45 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="ProfessionalServiceTotal"))
 */
class ProfessionalServiceTotal
{
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
     * @SWG\Property(example="Editorial Board")
     *
     */
    public $ProfessionalServiceType;
    /**
     * @var string
     *
     * @SWG\Property(example="Co-Editor, Journal of Economic Perspectives; January 2010-January 2013.")
     *
     */
    public $ProfessionalServiceDescription;
}