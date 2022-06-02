<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/24/2016
 * Time: 2:39 PM
 */

namespace MyNameSpace\AnnualReport;


class ReportServiceDAO extends BaseDAO
{
    public function getReportServices( $pkFaculty, $pkReport, $pkAcademicYear )
    {
        $stmt = $this->pdo->prepare("CALL spGetReportServices(?,?,?)");
        $stmt->bindParam(1, $pkFaculty , \PDO::PARAM_INT);
        $stmt->bindParam(2, $pkReport , \PDO::PARAM_INT);
        $stmt->bindParam(3, $pkAcademicYear , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class);
    }

    public function updateReportService( $pkReportService, $fkReport, $BookCommitteeCouncilName, $ReportServiceRole, $AddToNextYearsReport, $EditedBy)
    {
        $stmt = $this->pdo->prepare("CALL spUpdateReportService(?,?,?,?,?,?)");
        $stmt->bindParam(1, $pkReportService , \PDO::PARAM_INT);
        $stmt->bindParam(2, $fkReport , \PDO::PARAM_INT);
        $stmt->bindParam(3, $BookCommitteeCouncilName , \PDO::PARAM_STR);
        $stmt->bindParam(4,$ReportServiceRole , \PDO::PARAM_STR);
        $stmt->bindParam(5, $AddToNextYearsReport , \PDO::PARAM_BOOL);
        $stmt->bindParam(6, $EditedBy , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject($this->class);
    }

    public function deleteReportService( $pkReportService )
    {
        $stmt = $this->pdo->prepare("CALL spDeleteReportService(?)");
        $stmt->bindParam(1, $pkReportService , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}