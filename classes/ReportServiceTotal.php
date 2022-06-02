<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 11/15/2016
 * Time: 11:45 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="ReportServiceTotal"))
 */
class ReportServiceTotal
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
     * @SWG\Property(example="Chair")
     *
     */
    public $ReportServiceRole;
    /**
     * @var string
     *
     * @SWG\Property(example="Senior Faculty Recruitment Committee")
     *
     */
    public $BookCommitteeCouncilName;
}