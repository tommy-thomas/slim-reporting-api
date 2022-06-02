<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/23/2016
 * Time: 3:43 PM
 */

namespace MyNameSpace\AnnualReport;


class AdviseeDAO extends BaseDAO
{
    public function getAdvisees( $pkFaculty , $pkReport , $pkAcademicYear )
    {
        $stmt = $this->pdo->prepare("CALL spGetAdvisees(?,?,?)");
        $stmt->bindParam(1, $pkFaculty , \PDO::PARAM_INT);
        $stmt->bindParam(2, $pkReport , \PDO::PARAM_INT);
        $stmt->bindParam(3, $pkAcademicYear , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class );
    }

    public function updateAdvisee( $pkAdvisee, $pkReport,$fkAdviseeType , $fkAdviseeMAType, $IsOutsideAdvisee , $OutsideAdviseeInstitution , $StudentName ,  $TopicTitle , $fkAdviseeRole ,$AddToNextYearsReport, $EditedBy)
    {
        $stmt = $this->pdo->prepare("CALL spUpdateAdvisee(?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bindParam(1, $pkAdvisee , \PDO::PARAM_INT);
        $stmt->bindParam(2, $pkReport , \PDO::PARAM_INT);
        $stmt->bindParam(3, $fkAdviseeType , \PDO::PARAM_INT);
        $stmt->bindParam(4, $fkAdviseeMAType , \PDO::PARAM_INT);
        $stmt->bindParam(5, $IsOutsideAdvisee , \PDO::PARAM_BOOL);
        $stmt->bindParam(6, $OutsideAdviseeInstitution , \PDO::PARAM_STR);
        $stmt->bindParam(7, $StudentName , \PDO::PARAM_STR);
        $stmt->bindParam(8,  $TopicTitle , \PDO::PARAM_STR);
        $stmt->bindParam(9, $fkAdviseeRole , \PDO::PARAM_INT);
        $stmt->bindParam(10, $AddToNextYearsReport , \PDO::PARAM_BOOL);
        $stmt->bindParam(11, $EditedBy , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject( $this->class );
    }

    public function getAdviseeReport( $DepartmentIDs , $YearIDs )
    {
        $DecodedDepartmentIDs = rawurldecode($DepartmentIDs);
        $DecodedYearIDs = rawurldecode($YearIDs);
        $stmt = $this->pdo->prepare("CALL spGetAdviseeReport(?,?)");
        $stmt->bindParam(1, $DecodedDepartmentIDs , \PDO::PARAM_STR);
        $stmt->bindParam(2, $DecodedYearIDs , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\MyNameSpace\AnnualReport\AdviseeReport' );
    }

    public function getMAAdviseeReport( $DepartmentIDs , $YearIDs )
    {
        $DecodedDepartmentIDs = rawurldecode($DepartmentIDs);
        $DecodedYearIDs = rawurldecode($YearIDs);
        $stmt = $this->pdo->prepare("CALL spGetMAAdviseeReport(?,?)");
        $stmt->bindParam(1, $DecodedDepartmentIDs , \PDO::PARAM_STR);
        $stmt->bindParam(2, $DecodedYearIDs , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\MyNameSpace\AnnualReport\MAAdviseeReport' );
    }

    public function getAdviseeRoles()
    {
        $stmt = $this->pdo->prepare("CALL spGetAdviseeRoles()");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\MyNameSpace\AnnualReport\AdviseeRole' );
    }

    public function getAdviseeTypes()
    {
        $stmt = $this->pdo->prepare("CALL spGetAdviseeTypes()");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\MyNameSpace\AnnualReport\AdviseeType' );
    }

    public function getAdviseeMATypes()
    {
        $stmt = $this->pdo->prepare("CALL spGetAdviseeMATypes()");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\MyNameSpace\AnnualReport\AdviseeMAType' );
    }

    public function deleteAdvisee( $pkAdvisee )
    {
        $stmt = $this->pdo->prepare("CALL spDeleteAdvisee(?)");
        $stmt->bindParam(1, $pkAdvisee , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}