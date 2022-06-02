<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/19/2016
 * Time: 3:25 PM
 */

namespace MyNameSpace\AnnualReport;


class AcademicYearDAO extends BaseDAO
{

    public function getAcademicYear( $pkAcademicYear )
    {
        $stmt = $this->pdo->prepare("CALL spGetAcademicYear(?)");
        $stmt->bindParam(1, $pkAcademicYear , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject( $this->class );
    }

    public function getCurrentAcademicYear()
    {
        $stmt = $this->pdo->prepare("CALL spGetCurrentAcademicYear()");
        $stmt->execute();
        return $stmt->fetchObject('\MyNameSpace\AnnualReport\CurrentAcademicYear');
    }

    public function getAllAcademicYears()
    {
        $stmt = $this->pdo->prepare("CALL spGetAllAcademicYears()");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class);
    }

    public function setCurrentAcademicYear( $pkAcademicYear )
    {
        $stmt = $this->pdo->prepare("CALL spSetCurrentAcademicYear(?)");
        $stmt->bindParam(1, $pkAcademicYear , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject('\MyNameSpace\AnnualReport\CurrentAcademicYear');
    }

    public function addAcademicYear($AcademicYearStart, $AcademicYearEnd, $OpenReportDate, $FacultyDeadlineDate, $HardCloseDate, $HardCloseDateNoSubmit)
    {
        $stmt = $this->pdo->prepare("CALL spAddAcademicYear(?,?,?,?,?,?)");
        $OpenDate =  $this->UserInputToDate($OpenReportDate);
        $Deadline = $this->UserInputToDate($FacultyDeadlineDate);
        $HardClose = $this->UserInputToDate($HardCloseDate);
        $HardCloseNoSubmit = $this->UserInputToDate($HardCloseDateNoSubmit);
        $stmt->bindParam(1, $AcademicYearStart , \PDO::PARAM_STR);
        $stmt->bindParam(2, $AcademicYearEnd , \PDO::PARAM_STR);
        $stmt->bindParam(3, $OpenDate , \PDO::PARAM_STR);
        $stmt->bindParam(4, $Deadline , \PDO::PARAM_STR);
        $stmt->bindParam(5, $HardClose , \PDO::PARAM_STR);
        $stmt->bindParam(6, $HardCloseNoSubmit , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function updateAcademicYear($pkAcademicYear, $AcademicYearStart, $AcademicYearEnd, $OpenReportDate, $FacultyDeadlineDate, $HardCloseDate, $HardCloseDateNoSubmit)
    {
        $stmt = $this->pdo->prepare("CALL spUpdateAcademicYear(?,?,?,?,?,?,?)");
        $OpenDate =  $this->UserInputToDate($OpenReportDate);
        $Deadline = $this->UserInputToDate($FacultyDeadlineDate);
        $HardClose = $this->UserInputToDate($HardCloseDate);
        $HardCloseNoSubmit = $this->UserInputToDate($HardCloseDateNoSubmit);
        $stmt->bindParam(1, $pkAcademicYear , \PDO::PARAM_STR);
        $stmt->bindParam(2, $AcademicYearStart , \PDO::PARAM_STR);
        $stmt->bindParam(3, $AcademicYearEnd , \PDO::PARAM_STR);
        $stmt->bindParam(4, $OpenDate , \PDO::PARAM_STR);
        $stmt->bindParam(5, $Deadline , \PDO::PARAM_STR);
        $stmt->bindParam(6, $HardClose , \PDO::PARAM_STR);
        $stmt->bindParam(7, $HardCloseNoSubmit , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject($this->class);
    }

    public function updateCurrentAcademicYear(  $pkAcademicYear )
    {
        $stmt = $this->pdo->prepare("CALL spUpdateCurrentAcademicYear(?)");
        $stmt->bindParam(1, $pkAcademicYear , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject('\MyNameSpace\AnnualReport\CurrentAcademicYear');
    }
}