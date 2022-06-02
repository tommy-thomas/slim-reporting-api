<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/21/2016
 * Time: 10:42 PM
 */

namespace MyNameSpace\AnnualReport;


class ReportDAO extends BaseDAO
{
    /**
     * @param $pkReport
     * @return mixed
     */
    public function getReportByID($pkReport)
    {
        $stmt = $this->pdo->prepare("CALL spGetReport(?)");
        $stmt->bindParam(1, $pkReport);
        $stmt->execute();
        return $stmt->fetchObject($this->class);

    }

    /**
     * @param $pkReport
     * @param $fkAutumnStatus
     * @param $fkWinterStatus
     * @param $fkSpringStatus
     * @param $EditedBy
     * @return mixed
     */
    public function updateResidentStatus($pkReport, $fkAutumnStatus, $fkWinterStatus, $fkSpringStatus, $EditedBy)
    {
        $stmt = $this->pdo->prepare("CALL spUpdateResidenceStatus(?,?,?,?,?)");
        $stmt->bindParam(1, $pkReport , \PDO::PARAM_INT);
        $stmt->bindParam(2, $fkAutumnStatus , \PDO::PARAM_INT);
        $stmt->bindParam(3, $fkWinterStatus , \PDO::PARAM_INT);
        $stmt->bindParam(4, $fkSpringStatus , \PDO::PARAM_INT);
        $stmt->bindParam(5, $EditedBy , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject($this->class);

    }

    /**
     * @param $pkReport
     * @param $GrantFundedBuyOut
     * @param $OtherCourseRelease
     * @param $ReasonForBuyout
     * @param $EditedBy
     * @return mixed
     */
    public function updateTeaching($pkReport,  $GrantFundedBuyOut, $OtherCourseRelease, $ReasonForBuyout, $EditedBy)
    {
        $stmt = $this->pdo->prepare("CALL spUpdateTeaching(?,?,?,?,?)");
        $stmt->bindParam(1, $pkReport , \PDO::PARAM_INT);
        $stmt->bindParam(2,  $GrantFundedBuyOut , \PDO::PARAM_INT);
        $stmt->bindParam(3, $OtherCourseRelease , \PDO::PARAM_INT);
        $stmt->bindParam(4, $ReasonForBuyout , \PDO::PARAM_STR);
        $stmt->bindParam(5, $EditedBy , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject($this->class);

    }

    /**
     * @param $pkReport
     * @param $NarrativeReport
     * @return Report
     */
    public function updateNarrativeReport( $pkReport , $NarrativeReport, $EditedBy )
    {
        $stmt = $this->pdo->prepare("CALL spUpdateNarrativeReport(?,?,?)");
        $stmt->bindParam(1, $pkReport , \PDO::PARAM_INT);
        $stmt->bindParam(2, $NarrativeReport , \PDO::PARAM_STR);
        $stmt->bindParam(3, $EditedBy , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject($this->class);
    }

    public function getResidentStatusIDByHistoricalName( $ResidentStatusTypeHistorical)
    {
        $stmt = $this->pdo->prepare("CALL spGetResidentStatusIDByHistoricalName(?)");
        $stmt->bindParam(1, $ResidentStatusTypeHistorical , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getReportSummary( $pkReport )
    {
        $stmt = $this->pdo->prepare("CALL spGetReportSummary(?)");
        $stmt->bindParam(1, $pkReport , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject('\MyNameSpace\AnnualReport\ReportSummary');
    }

    public function getReportActivityLog( $pkReport )
    {
        $stmt = $this->pdo->prepare("CALL spGetActivityLog(?)");
        $stmt->bindParam(1, $pkReport , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\MyNameSpace\AnnualReport\ReportActivityLog');
    }

    public function getAdvisingTotals( $pkReport, $pkFaculty)
    {
        $stmt = $this->pdo->prepare("CALL spGetAdviseeTotals(?)");
        $stmt->bindParam(1, $pkReport , \PDO::PARAM_INT);
        $stmt->execute();
        $AdvisingTotals = $stmt->fetchObject('\MyNameSpace\AnnualReport\AdviseeTotals');
        $stmt = $this->pdo->prepare("CALL spGetAdviseeThreeYearTotals(?)");
        $stmt->bindParam(1, $pkFaculty , \PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_INTO , $AdvisingTotals);
        return $stmt->fetch();
    }

    public function getDashBoardTotals( $pkFaculty)
    {
        $DashBoardTotals = new DashBoardTotals();
        // Advisee totals
        $stmt = $this->pdo->prepare("CALL spGetAdviseeTotals(?)");
        $stmt->bindParam(1, $pkFaculty , \PDO::PARAM_INT);
        $stmt->execute();
        $AdviseeTotals = $stmt->fetchObject('\MyNameSpace\AnnualReport\AdviseeTotals');
        // Advisee three year totals
        if( isset($AdviseeTotals) && ( $AdviseeTotals instanceof AdviseeTotals ) ){
            $stmt = $this->pdo->prepare("CALL spGetAdviseeThreeYearTotals(?)");
            $stmt->bindParam(1, $pkFaculty , \PDO::PARAM_INT);
            $stmt->execute();
            $stmt->setFetchMode(\PDO::FETCH_INTO ,  $AdviseeTotals);
            $stmt->fetch();
            $DashBoardTotals->setAdviseeTotals( $AdviseeTotals );
        } else {
            $stmt = $this->pdo->prepare("CALL spGetAdviseeThreeYearTotals(?)");
            $stmt->bindParam(1, $pkFaculty , \PDO::PARAM_INT);
            $stmt->execute();
            $AdviseeTotals = $stmt->fetchObject('\MyNameSpace\AnnualReport\AdviseeTotals');
            $DashBoardTotals->setAdviseeTotals( $AdviseeTotals );
        }
        // Publication totals
        $stmt = $this->pdo->prepare("CALL spGetPublicationsTotals(?)");
        $stmt->bindParam(1, $pkFaculty , \PDO::PARAM_INT);
        $stmt->execute();
        $PublicationTotals = $stmt->fetchAll(\PDO::FETCH_CLASS,  '\MyNameSpace\AnnualReport\PublicationTotal');
        $DashBoardTotals->setPublicationTotals( $PublicationTotals );
        // Grants and Fellowships totals
        $stmt = $this->pdo->prepare("CALL spGetGrantsAndFellowshipTotals(?)");
        $stmt->bindParam(1, $pkFaculty , \PDO::PARAM_INT);
        $stmt->execute();
        $GrantAndFellowshipTotals = $stmt->fetchAll(\PDO::FETCH_CLASS,  '\MyNameSpace\AnnualReport\GrantAndFellowshipTotal');
        $DashBoardTotals->setGrantAndFellowshipTotals( $GrantAndFellowshipTotals );
        // Professional Services
        $stmt = $this->pdo->prepare("CALL spGetProfessionalServiceTotals(?)");
        $stmt->bindParam(1, $pkFaculty , \PDO::PARAM_INT);
        $stmt->execute();
        $ProfessionalServiceTotals = $stmt->fetchAll(\PDO::FETCH_CLASS,  '\MyNameSpace\AnnualReport\ProfessionalServiceTotal');
        $DashBoardTotals->setProfessionalServiceTotals( $ProfessionalServiceTotals );
        // company Services
        $stmt = $this->pdo->prepare("CALL spGetReportServiceTotals(?)");
        $stmt->bindParam(1, $pkFaculty , \PDO::PARAM_INT);
        $stmt->execute();
        $ReportServiceTotals = $stmt->fetchAll(\PDO::FETCH_CLASS,  '\MyNameSpace\AnnualReport\ReportServiceTotal');
        $DashBoardTotals->setReportServiceTotals( $ReportServiceTotals );
        // Teaching (Courses)
        $stmt = $this->pdo->prepare("CALL spGetTeachingTotals(?)");
        $stmt->bindParam(1, $pkFaculty , \PDO::PARAM_INT);
        $stmt->execute();
        $CourseTotals = $stmt->fetchAll(\PDO::FETCH_CLASS,  '\MyNameSpace\AnnualReport\CourseTotal');
        $DashBoardTotals->setCourseTotals( $CourseTotals );
        // Enrollment
        $stmt = $this->pdo->prepare("CALL spGetEnrollmentTotals(?)");
        $stmt->bindParam(1, $pkFaculty , \PDO::PARAM_INT);
        $stmt->execute();
        $EnrollmentTotals = $stmt->fetchAll(\PDO::FETCH_CLASS,  '\MyNameSpace\AnnualReport\EnrollmentTotal');
        $DashBoardTotals->setEnrollmentTotals( $EnrollmentTotals );
        return $DashBoardTotals;
    }

      public function submitReport( $pkReport )
    {
        $stmt = $this->pdo->prepare("CALL spSubmitReport(?)");
        $stmt->bindParam(1, $pkReport , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject( $this->class );
    }

    public function unSubmitReport( $pkReport )
    {
        $stmt = $this->pdo->prepare("CALL spUnSubmitReport(?)");
        $stmt->bindParam(1, $pkReport , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject( $this->class );
    }
}