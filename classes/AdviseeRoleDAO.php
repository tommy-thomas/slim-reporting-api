<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 10/13/2016
 * Time: 2:57 PM
 */

namespace MyNameSpace\AnnualReport;


class AdviseeRoleDAO
{
    public function getAdvisees( $pk_faculty , $pk_report , $academic_year )
    {
        $stmt = $this->pdo->prepare("CALL spGetAdvisees(?,?,?)");
        $stmt->bindParam(1, $pk_faculty , \PDO::PARAM_INT);
        $stmt->bindParam(2, $pk_report , \PDO::PARAM_INT);
        $stmt->bindParam(3, $academic_year);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class );
    }
}