<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 9/30/2016
 * Time: 12:59 PM
 */

namespace MyNameSpace\AnnualReport;


class DepartmentDAO extends BaseDAO
{
    public function getDepartments()
    {
        $stmt = $this->pdo->prepare("CALL spGetDepartments()");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class);
    }

    public function getDepartmentIDByName( $DepartmentName )
    {
        $stmt = $this->pdo->prepare("CALL spGetDepartmentIDByName(?)");
        $stmt->bindParam(1, $DepartmentName , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject( $this->class );
    }

}