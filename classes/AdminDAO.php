<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/17/2016
 * Time: 3:40 PM
 */

namespace MyNameSpace\AnnualReport;


class AdminDAO extends BaseDAO
{

    /**
     * @param $personID
     * @return Admin
     */
    public function getOneAdmin($personID)
    {
        $stmt = $this->pdo->prepare("CALL spAdminLogIn(?)");
        $stmt->bindParam(1, $personID , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject( $this->class );
    }

    public function getAdmins()
    {
        $stmt = $this->pdo->prepare("CALL spGetAdmins()");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class );
    }

    public function getAdminAccessLevels()
    {
        $stmt = $this->pdo->prepare("CALL spGetAdminAccessLevels()");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\MyNameSpace\AnnualReport\AdminAccessLevel' );
    }

    public function addOneAdmin($personID , $FirstName , $LastName , $fkAccessLevel , $DepartmentIDS, $EditedBy)
    {
        $stmt = $this->pdo->prepare("CALL spAddAdmin(?,?,?,?,?,?)");
        $stmt->bindParam(1, $personID , \PDO::PARAM_STR);
        $stmt->bindParam(2, $FirstName , \PDO::PARAM_STR);
        $stmt->bindParam(3, $LastName , \PDO::PARAM_STR);
        $stmt->bindParam(4, $fkAccessLevel , \PDO::PARAM_INT);
        $stmt->bindParam(5, $DepartmentIDS , \PDO::PARAM_STR);
        $stmt->bindParam(6, $EditedBy,\PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function deleteAdmin($pkAdmin)
    {
        $stmt = $this->pdo->prepare("CALL spDeleteAdmin(?)");
        $stmt->bindParam(1, $pkAdmin , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}