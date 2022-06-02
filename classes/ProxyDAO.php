<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/19/2016
 * Time: 10:25 PM
 */

namespace MyNameSpace\AnnualReport;


class ProxyDAO extends BaseDAO
{
    /**
     * @param $personID
     * @param $faculty_id
     * @return Proxy
     */
    public function proxyLogIn( $personID , $pkAcademicYear)
    {
        $stmt = $this->pdo->prepare("CALL spProxyLogIn(?,?)");
        $stmt->bindParam(1, $personID , \PDO::PARAM_STR);
        $stmt->bindParam(2, $pkAcademicYear , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject($this->class);
    }

    /**
     * @param $personID
     * @param $FirstName
     * @param $LastName
     * @param $faculty_id
     * @return array
     */
    public function addProxy( $personID, $FirstName, $LastName, $pkFaculty)
    {
        $stmt = $this->pdo->prepare("CALL spAddProxy(?,?,?,?)");
        $stmt->bindParam(1, $personID , \PDO::PARAM_STR);
        $stmt->bindParam(2, $FirstName , \PDO::PARAM_STR);
        $stmt->bindParam(3, $LastName , \PDO::PARAM_STR);
        $stmt->bindParam(4, $pkFaculty, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllFacultyByProxyID( $pkProxy)
    {
        $stmt = $this->pdo->prepare("CALL spGetAllFacultyByProxyID(?)");
        $stmt->bindParam(1, $pkProxy, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\MyNameSpace\AnnualReport\Faculty');
    }

    public function lookUpFacultyBypersonID( $personID )
    {
        $stmt = $this->pdo->prepare("CALL spLookUpProxyFacultyBypersonID(?)");
        $stmt->bindParam(1, $personID , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class);
    }

    public function deleteProxy($pkProxyFaculty)
    {
        $stmt = $this->pdo->prepare("CALL spDeleteProxy(?)");
        $stmt->bindParam(1, $pkProxyFaculty, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}