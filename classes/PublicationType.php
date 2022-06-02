<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 10/24/2016
 * Time: 11:42 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="PublicationType"))
 */
class PublicationType extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $pkPublicationType;
    /**
     * @var string
     *
     * @SWG\Property(example="Article")
     *
     */
    public $PublicationType;


    public function getpkPublicationTypeDataType() {
        return \PDO::PARAM_INT;
    }
    public function getPublicationTypeDataType() {
        return \PDO::PARAM_STR;
    }
}