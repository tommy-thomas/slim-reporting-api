<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 9/12/2016
 * Time: 12:20 PM
 */

namespace MyNameSpace\AnnualReport;


class GrantAndFellowshipDAO extends BaseDAO
{
    public function getGrantsAndFellowships( $pkReport )
    {
        $stmt = $this->pdo->prepare("CALL spGetGrantsAndFellowships(?)");
        $stmt->bindParam(1, $pkReport , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class);
    }

    public function getGrantFellowhipStatus()
    {
        $stmt = $this->pdo->prepare("CALL spGetGrantFellowhipStatus()");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,  '\MyNameSpace\AnnualReport\GrantFellowshipStatus');
    }

    public function getGrantFellowshipTypes()
    {
        $stmt = $this->pdo->prepare("CALL spGetGrantFellowshipTypes()");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,  '\MyNameSpace\AnnualReport\GrantFellowshipType');
    }


    public function updateGrantAndFellowship( $pkGrantFellowship,$pkReport,$fkGrantFellowshipType, $fkGrantFellowshipStatus,$ProjectTitle , $FundingAgency , $Abstract , $ProjectBudget , $TotalAmountRequested , $TotalAmountAwarded , $AwardStartDate ,$AwardEndDate , $Reason ,$IsAssociatedWithResearchLeave , $EditedBy)
    {
        $stmt = $this->pdo->prepare("CALL spUpdateGrantAndFellowship(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $StarDate = $this->UserInputToDate($AwardStartDate);
        $EndDate = $this->UserInputToDate($AwardEndDate);
        $stmt->bindParam(1, $pkGrantFellowship , \PDO::PARAM_INT);
        $stmt->bindParam(2, $pkReport , \PDO::PARAM_INT);
        $stmt->bindParam(3, $fkGrantFellowshipType , \PDO::PARAM_INT);
        $stmt->bindParam(4, $fkGrantFellowshipStatus , \PDO::PARAM_INT);
        $stmt->bindParam(5, $ProjectTitle , \PDO::PARAM_STR);
        $stmt->bindParam(6, $FundingAgency , \PDO::PARAM_STR);
        $stmt->bindParam(7, $Abstract , \PDO::PARAM_STR);
        $stmt->bindParam(8, $ProjectBudget , \PDO::PARAM_INT);
        $stmt->bindParam(9, $TotalAmountRequested ,\PDO::PARAM_INT);
        $stmt->bindParam(10, $TotalAmountAwarded ,\PDO::PARAM_INT);
        $stmt->bindParam(11, $StarDate , \PDO::PARAM_STR);
        $stmt->bindParam(12, $EndDate , \PDO::PARAM_STR);
        $stmt->bindParam(13, $Reason , \PDO::PARAM_STR);
        $stmt->bindParam(14, $IsAssociatedWithResearchLeave , \PDO::PARAM_INT);
        $stmt->bindParam(15, $EditedBy , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject( $this->class );
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

    public function deleteGrantsAndFellowships( $pkGrantFellowship )
    {
        $stmt = $this->pdo->prepare("CALL spDeleteGrandAndFellowship(?)");
        $stmt->bindParam(1, $pkGrantFellowship , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }


}