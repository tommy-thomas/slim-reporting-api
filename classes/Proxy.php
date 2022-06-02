<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/15/2016
 * Time: 2:31 PM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="Proxy"))
 */
class Proxy extends User {

    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $pkProxyFaculty;
    /**
     * @var int
     *
     * @SWG\Property(example="6")
     *
     */
    public $pkProxy;
    /**
     * @var boolean
     *
     * @SWG\Property(example="1")
     *
     */
    public $Active;

    public function getpkProxyDataType() {
        return \PDO::PARAM_INT;
    }
    public function getpkFacultyDataType() {
        return \PDO::PARAM_INT;
    }

}