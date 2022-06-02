<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/22/2016
 * Time: 4:35 PM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="ReportCollection"))
 */
class ReportCollection extends \Shared\DynamicGetterSetter
{
    // Collections
    protected $Courses;
    protected $Advisees;
    protected $ReportServices;
    protected $Publications;
    protected $HonorsAndAwards;
    protected $GrantsAndFellowships;
    protected $CurriculumVita;

    public function __construct()
    {
        $this->Courses = new Collection();
        $this->Advisees = new Collection();
        $this->ReportServices = new Collection();
        $this->Publications = new Collection();
        $this->HonorsAndAwards = new Collection();
        $this->GrantsAndFellowships = new Collection();
        $this->CurriculumVita = new Collection();
    }
}