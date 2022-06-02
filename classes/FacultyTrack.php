<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 11/3/2016
 * Time: 11:54 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="FacultyTrack"))
 */
class FacultyTrack extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $pkFacultyTrack;
    /**
     * @var string
     *
     * @SWG\Property(example="Tenure-track")
     *
     */
    public $FacultyTrack;


    public function getpkFacultyTrackDataType() {
        return \PDO::PARAM_INT;
    }
    public function getFacultyTrackDataType() {
        return \PDO::PARAM_STR;
    }
}