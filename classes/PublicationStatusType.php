<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 10/24/2016
 * Time: 11:57 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="PublicationStatusType"))
 */
class PublicationStatusType extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="2")
     *
     */
    public $pkPublicationStatusType;
    /**
     * @var string
     *
     * @SWG\Property(example="Submitted for Review")
     *
     */
    public $PublicationStatusType;


    public function getpkPublicationStatusTypeDataType() {
        return \PDO::PARAM_INT;
    }
    public function getPublicationStatusTypeDataType() {
        return \PDO::PARAM_STR;
    }
}