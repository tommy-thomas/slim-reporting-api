<?php
namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="Department"))
 */
class Department extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="6")
     *
     */
    public $pkDepartment;
    /**
     * @var string
     *
     * @SWG\Property(example="Anthropology")
     *
     */
    public $DepartmentName;

    public function getpkDepartmentDataType() {
        return \PDO::PARAM_INT;
    }
    public function getDepartmentNameDataType() {
        return \PDO::PARAM_STR;
    }
}