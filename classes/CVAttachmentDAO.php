<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/29/2016
 * Time: 10:05 AM
 */

namespace MyNameSpace\AnnualReport;


class CVAttachmentDAO extends BaseDAO
{
    /**
     * @param $pkReport
     * @return  CVAttachment
     */
    public function getCVAttachments( $pkReport )
    {
        $stmt = $this->pdo->prepare("CALL spGetCVAttachments(?)");
        $stmt->bindParam(1, $pkReport);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\MyNameSpace\AnnualReport\CVAttachment');
    }

    /**
     * @param $pkReport
     * @param $CVAttachmentFile
     * @return  CVAttachment
     */
    public function addCVAttachment( $pkReport, $OriginalFileName, $SystemFileName, $EditedBy)
    {
        $stmt = $this->pdo->prepare("CALL spAddCVAttachment(?,?,?,?)");
        $stmt->bindParam(1, $pkReport);
        $stmt->bindParam(2, $OriginalFileName);
        $stmt->bindParam(3, $SystemFileName);
        $stmt->bindParam(4, $EditedBy);
        $stmt->execute();
        return $stmt->fetchObject('\MyNameSpace\AnnualReport\CVAttachment');
    }

    public function deleteCVAttachment( $pkCVAttachment )
    {
        $stmt = $this->pdo->prepare("CALL spDeleteCVAttachment(?)");
        $stmt->bindParam(1, $pkCVAttachment);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}