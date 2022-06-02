<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/29/2016
 * Time: 12:43 PM
 */

namespace MyNameSpace\AnnualReport;


class ResearchSupportDAO extends BaseDAO
{
    /**
     * @param $pkFaculty
     * @return ResearchSupport
     */
    public function getResearchSupport( $pkFaculty )
    {
        $stmt = $this->pdo->prepare("CALL spGetResearchSupport(?)");
        $stmt->bindParam(1, $pkFaculty  , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class);
    }

    public function updateResearchSupport( $pkResearchSupport ,  $fkFaculty ,  $fkAcademicYear ,  $ResearchSupportStartDate, $ResearchSupportEndDate, $Amount, $Comments)
    {
        $stmt = $this->pdo->prepare("CALL spUpdateResearchSupport(?,?,?,?,?,?,?)");
        $StarDate = $this->UserInputToDate($ResearchSupportStartDate);
        $EndDate = $this->UserInputToDate($ResearchSupportEndDate);
        $stmt->bindParam(1, $pkResearchSupport , \PDO::PARAM_INT);
        $stmt->bindParam(2, $fkFaculty , \PDO::PARAM_INT);
        $stmt->bindParam(3, $fkAcademicYear , \PDO::PARAM_INT);
        $stmt->bindParam(4, $StarDate , \PDO::PARAM_STR);
        $stmt->bindParam(5, $EndDate ,  \PDO::PARAM_STR);
        $stmt->bindParam(6, $Amount , \PDO::PARAM_INT);
        $stmt->bindParam(7, $Comments , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject($this->class);
    }

    public function getFinancialCommitmentReport( $DepartmentIDs, $YearIDs, $StartDate, $EndDate, $EditedDate)
    {
        $DecodedDepartmentIDs = rawurldecode($DepartmentIDs);
        $DecodedYearIDs = rawurldecode($YearIDs);
        $stmt = $this->pdo->prepare("CALL spGetFinancialCommitmentReport(?,?,?,?,?)");
        $stmt->bindParam(1, $DecodedDepartmentIDs , \PDO::PARAM_STR);
        $stmt->bindParam(2, $DecodedYearIDs , \PDO::PARAM_STR);
        $stmt->bindParam(3, $StartDate , \PDO::PARAM_STR);
        $stmt->bindParam(4, $EndDate , \PDO::PARAM_STR);
        $stmt->bindParam(5, $EditedDate , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,  '\MyNameSpace\AnnualReport\FinancialCommitmentReport');
    }


    public function deleteResearchReport( $pkResearchSupport )
    {
        $stmt = $this->pdo->prepare("CALL spDeleteResearchReport(?)");
        $stmt->bindParam(1, $pkResearchSupport , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }


}