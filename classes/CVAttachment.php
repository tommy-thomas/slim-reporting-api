<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/17/2016
 * Time: 12:50 AM
 */

namespace MyNameSpace\AnnualReport;

/**
 * @SWG\Definition(type="object", @SWG\Xml(name="CVAttachment"))
 */
class CVAttachment extends \Shared\DynamicGetterSetter {

    /**
     * @var int
     *
     * @SWG\Property(example="78")
     *
     */
    public $pkCVAttachment;
    /**
     * @var int
     *
     * @SWG\Property(example="90")
     *
     */
    public $fkReport;
    /**
     * @var string
     *
     * @SWG\Property(example="DerekNealCV.pdf")
     *
     */
    public $OriginalFileName;
    /**
     * @var string
     *
     * @SWG\Property(example="DerekNealCV.pdf")
     *
     */
    public $SystemFileName;
    /**
     * @var string
     *
     * @SWG\Property(example="2017-03-30 10:54:10")
     *
     */
    public $DateUploaded;
    /**
     * @var string
     *
     * @SWG\Property(example="tommyt")
     *
     */
    public $EditedBy;


    public function getpkCVAttachmentDataType() {
        return \PDO::PARAM_INT;
    }
    public function getfkReportDataType() {
        return \PDO::PARAM_INT;
    }
    public function getOriginalFileNameDataType() {
        return \PDO::PARAM_STR;
    }
    public function getSystemFileNameDataType() {
        return \PDO::PARAM_STR;
    }
    public function getDateUploadedDataType() {
        return \PDO::PARAM_STR;
    }
    public function getEditedByDataType() {
        return \PDO::PARAM_STR;
    }
}