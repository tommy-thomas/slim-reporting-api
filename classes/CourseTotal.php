<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 11/15/2016
 * Time: 2:36 PM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="CourseTotal"))
 */
class CourseTotal
{
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
     * @SWG\Property(example="SCTH")
     *
     */
    public $Subject;
    /**
     * @var string
     *
     * @SWG\Property(example="Spring")
     *
     */
    public $Quarter;
    /**
     * @var string
     *
     * @SWG\Property(example="")
     *
     */
    public $CourseType;
    /**
     * @var string
     *
     * @SWG\Property(example="SCTH 30927: Knowledge as a Platter: Comparative Perspectives on Knowledge Texts in the Ancient World (KNOW 31415, HREL 30927, SA")
     *
     */
    public $CourseTitle;
}