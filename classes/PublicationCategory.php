<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 10/24/2016
 * Time: 3:11 PM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="PublicationCategory"))
 */
class PublicationCategory extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="1")
     *
     */
    public $pkPublicationCategory;
    /**
     * @var string
     *
     * @SWG\Property(example="New")
     *
     */
    public $PublicationCategory;


    public function getpkPublicationCategoryDataType() {
        return \PDO::PARAM_INT;
    }
    public function getPublicationCategoryDataType() {
        return \PDO::PARAM_STR;
    }
}