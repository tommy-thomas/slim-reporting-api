<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 11/15/2016
 * Time: 1:50 PM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="CourseType"))
 */
class CourseType extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $pkCourseType;
    /**
     * @var string
     *
     * @SWG\Property(example="Undergraduate only")
     *
     */
    public $CourseType;


    public function getpkCourseTypeDataType() {
        return \PDO::PARAM_INT;
    }
    public function getCourseTypeDataType() {
        return \PDO::PARAM_STR;
    }
}