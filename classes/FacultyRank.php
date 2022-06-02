<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 11/3/2016
 * Time: 11:43 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="FacultyRank"))
 */
class FacultyRank extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $pkFacultyRank;
    /**
     * @var string
     *
     * @SWG\Property(example="Instructor")
     *
     */
    public $FacultyRank;


    public function getpkFacultyRankDataType() {
        return \PDO::PARAM_INT;
    }
    public function getFacultyRankDataType() {
        return \PDO::PARAM_STR;
    }
}