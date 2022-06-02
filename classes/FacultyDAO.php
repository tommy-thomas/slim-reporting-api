<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/18/2016
 * Time: 2:14 PM
 */

namespace MyNameSpace\AnnualReport;


class FacultyDAO extends BaseDAO
{
    private $container;

    public function __construct($app, $className)
    {
        parent::__construct($className);
        if( !(is_null($app))){
            $this->container = $app->getContainer();
        }
    }

    /**
     * @param $personID
     * @return Faculty
     *
     */
    public function facultyLogIn($personID, $pkAcademicYear)
    {
        $stmt = $this->pdo->prepare("CALL spFacultyLogIn(?,?)");
        $stmt->bindParam(1, $personID, \PDO::PARAM_STR);
        $stmt->bindParam(2, $pkAcademicYear, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject($this->class);
    }

    /**
     * @param $personID
     * @param $FirstName
     * @param $LastName
     * @param $Email
     * @param $EditedBy
     * @return mixed
     * )
     */
    public function addFaculty($personID, $FirstName, $LastName, $Email, $EditedBy)
    {
        $stmt = $this->pdo->prepare("CALL spAddFaculty(?,?,?,?,?)");
        $stmt->bindParam(1, $personID, \PDO::PARAM_STR);
        $stmt->bindParam(2, $FirstName, \PDO::PARAM_STR);
        $stmt->bindParam(3, $LastName, \PDO::PARAM_STR);
        $stmt->bindParam(4, $Email, \PDO::PARAM_STR);
        $stmt->bindParam(5, $EditedBy, \PDO::PARAM_STR);
        $stmt->execute();
        $msg = $stmt->fetchAll();
        $stmt->closeCursor();
        if (!is_null($this->container)) {
            $this->aisNewFacultyCourseImport($personID, $msg, $EditedBy);
        }
        return $msg;
    }

    private function aisNewFacultyCourseImport($personID, $msg = null, $EditedBy)
    {
        if (is_null($msg) || is_null($personID)) {
            return false;
        }
        if (
            isset($msg[0]['success'])
            && !is_null($this->container)
            && isset($this->container['AisController'])) {
            $this->container['AisController']
                ->aisFacultyCourseImport($personID, $EditedBy);
            return true;
        }
    }

    /**
     * @param $pkReport
     * @param $pkUser
     * @param $pkFaculty
     * @param $pkAcademicYear
     * @param $FirstName
     * @param $LastName
     * @param $DepartmentIDs
     * @param $EditedBy
     * @return mixed
     *
     */
    public function updateFacultyProfile($pkReport, $pkUser, $pkFaculty, $pkAcademicYear, $FirstName, $LastName, $DepartmentIDs, $EditedBy)
    {
        $stmt = $this->pdo->prepare("CALL spUpdateProfile(?,?,?,?,?,?,?,?)");
        $stmt->bindParam(1, $pkReport, \PDO::PARAM_INT);
        $stmt->bindParam(2, $pkUser, \PDO::PARAM_INT);
        $stmt->bindParam(3, $pkFaculty, \PDO::PARAM_INT);
        $stmt->bindParam(4, $pkAcademicYear, \PDO::PARAM_INT);
        $stmt->bindParam(5, $FirstName, \PDO::PARAM_STR);
        $stmt->bindParam(6, $LastName, \PDO::PARAM_STR);
        $stmt->bindParam(7, $DepartmentIDs, \PDO::PARAM_STR);
        $stmt->bindParam(8, $EditedBy, \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject($this->class);
    }

    /**
     * @param $pkFaculty
     * @param $pkAcademicYear
     * @return mixed
     *
     */
    public function getFacultyByID($pkFaculty, $pkAcademicYear)
    {
        $stmt = $this->pdo->prepare("CALL spGetFacultyById(?,?)");
        $stmt->bindParam(1, $pkFaculty, \PDO::PARAM_INT);
        $stmt->bindParam(2, $pkAcademicYear, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject($this->class);
    }

    /**
     * @param $pkAcademicYear
     * @return Faculty
     *
     *
     */
    public function getAllFacultyByAcademicYear($pkAcademicYear)
    {
        $stmt = $this->pdo->prepare("CALL spGetAllFacultyByAcademicYear(?)");
        $stmt->bindParam(1, $pkAcademicYear, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class);
    }

    public function getFacultyProxies($pkFaculty)
    {
        $stmt = $this->pdo->prepare("CALL spGetFacultyProxies(?)");
        $stmt->bindParam(1, $pkFaculty, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\MyNameSpace\AnnualReport\Proxy');
    }

    public function getAllFacultyByAcademicYearAndDepartmentID($pkAcademicYear, $pkDepartment)
    {
        $stmt = $this->pdo->prepare("CALL spGetAllFacultyByAcademicYearAndDepartmentID(?,?)");
        $stmt->bindParam(1, $pkAcademicYear, \PDO::PARAM_INT);
        $stmt->bindParam(2, $pkDepartment, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class);
    }

    /**
     * @return mixed
     */
    public function getAllFaculty()
    {
        $stmt = $this->pdo->prepare("CALL spGetAllFaculty()");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class);
    }

    public function searchFacultyByKeyword($pkAcademicYear, $SearchTerm)
    {
        $stmt = $this->pdo->prepare("CALL spSearchFacultyByKeyword(?,?)");
        $stmt->bindParam(1, $pkAcademicYear, \PDO::PARAM_INT);
        $stmt->bindParam(2, $SearchTerm, \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class);
    }

    public function lookUpFacultyBypersonID($personID)
    {
        $stmt = $this->pdo->prepare("CALL spLookUpFacultyBypersonID(?)");
        $stmt->bindParam(1, $personID, \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class);
    }

    public function deleteFaculty($pkFaculty, $pkAcademicYear)
    {
        $stmt = $this->pdo->prepare("CALL spDeleteFaculty(?,?)");
        $stmt->bindParam(1, $pkFaculty, \PDO::PARAM_INT);
        $stmt->bindParam(2, $pkAcademicYear, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }


}