<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/24/2016
 * Time: 5:29 PM
 */

namespace MyNameSpace\AnnualReport;


class HonorAndAwardDAO extends BaseDAO
{
    public function getHonorAndAwards( $pkReport )
    {
        $stmt = $this->pdo->prepare("CALL spGetHonorsAndAwards(?)");
        $stmt->bindParam(1, $pkReport , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class);
    }

    public function updateHonorAndAward( $pkHonorAward , $fkReport , $AwardName, $AwardDescription, $EditedBy )
    {
        $stmt = $this->pdo->prepare("CALL spUpdateHonorAndAward(?,?,?,?,?)");
        $stmt->bindParam(1, $pkHonorAward , \PDO::PARAM_INT);
        $stmt->bindParam(2, $fkReport , \PDO::PARAM_INT);
        $stmt->bindParam(3, $AwardName , \PDO::PARAM_STR);
        $stmt->bindParam(4,$AwardDescription , \PDO::PARAM_STR);
        $stmt->bindParam(5, $EditedBy , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject( $this->class );
    }

    public function getHonorsAndAwardsReport( $DepartmentIDs , $YearIDs )
    {
        $DecodedDepartmentIDs = rawurldecode($DepartmentIDs);
        $DecodedYearIDs = rawurldecode($YearIDs);
        $stmt = $this->pdo->prepare("CALL spGetHonorsAndAwardsReport(?,?)");
        $stmt->bindParam(1, $DecodedDepartmentIDs , \PDO::PARAM_STR);
        $stmt->bindParam(2, $DecodedYearIDs , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\MyNameSpace\AnnualReport\HonorAndAwardReport' );
    }
    
    public function deleteHonorAndAward( $pkHonorAward )
    {
        $stmt = $this->pdo->prepare("CALL spDeleteHonorAndAward(?)");
        $stmt->bindParam(1, $pkHonorAward , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}