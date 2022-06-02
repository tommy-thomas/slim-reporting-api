<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/22/2016
 * Time: 4:59 PM
 */

namespace MyNameSpace\AnnualReport;


class CourseDAO extends BaseDAO
{
    /**
     * @param $pkReport
     * @param $fkQuarter
     * @param $Subject
     * @param $CourseTitle
     * @param $UndergratuateEnrollment
     * @param $GraduateEnrollment
     * @param $CLASS_NBR
     * @param $STRM
     * @param $EditedBy
     * @return mixed
     */
    public function addCourse($pkReport, $fkQuarter, $Subject, $CourseTitle, $UndergratuateEnrollment,$GraduateEnrollment,$CRSE_ID,$INSTRUCTOR_EMPLID,$CLASS_NBR,$STRM, $EditedBy)
    {
        $stmt = $this->pdo->prepare("CALL spAddCourse(?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bindParam(1, $pkReport , \PDO::PARAM_INT);
        $stmt->bindParam(2, $fkQuarter , \PDO::PARAM_INT);
        $stmt->bindParam(3, $Subject , \PDO::PARAM_STR);
        $stmt->bindParam(4, $CourseTitle , \PDO::PARAM_STR);
        $stmt->bindParam(5, $UndergratuateEnrollment , \PDO::PARAM_INT);
        $stmt->bindParam(6, $GraduateEnrollment , \PDO::PARAM_INT);
        $stmt->bindParam(7, $CRSE_ID , \PDO::PARAM_INT);
        $stmt->bindParam(8, $INSTRUCTOR_EMPLID , \PDO::PARAM_INT);
        $stmt->bindParam(9, $CLASS_NBR , \PDO::PARAM_BOOL);
        $stmt->bindParam(10, $STRM , \PDO::PARAM_INT);
        $stmt->bindParam(11,$EditedBy , \PDO::PARAM_INT);
        $stmt->execute();
        $stmt->fetchAll();
    }

    /**
     * @param $pkCourse
     * @param $fkCourseType
     * @param $IsCoreCurriculum
     * @param $IsCoTaught
     * @param $EditedBy
     * @return mixed
     */
    public function updateCourse( $pkCourse, $fkCourseType,$IsCoreCurriculum,$IsCoTaught, $EditedBy)
    {
        $stmt = $this->pdo->prepare("CALL spUpdateCourse(?,?,?,?,?)");
        $stmt->bindParam(1, $pkCourse , \PDO::PARAM_INT);
        $stmt->bindParam(2, $fkCourseType , \PDO::PARAM_INT);
        $stmt->bindParam(3, $IsCoreCurriculum );
        $stmt->bindParam(4, $IsCoTaught );
        $stmt->bindParam(5,$EditedBy , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject($this->class);
    }
    /**
     * @param $pkReport
     * @return mixed
     */
    public function getCourses( $pkReport)
    {
        $stmt = $this->pdo->prepare("CALL spGetCourses(?)");
        $stmt->bindParam(1, $pkReport , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class);
    }

    public function getCourseTypes()
    {
        $stmt = $this->pdo->prepare("CALL spGetCourseTypes()");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\MyNameSpace\AnnualReport\CourseType');
    }

    /**
     * @param $SubjectString
     * @param $YearIDs
     * @return mixed
     */
    public function getTeachingAndEnrollmentReport( $DepartmentIDs, $YearIDs )
    {
        $DecodedDepartmentIDs = rawurldecode($DepartmentIDs);
        $DecodedYearIDs = rawurldecode($YearIDs);
        $stmt = $this->pdo->prepare("CALL spGetTeachingAndEnrollmentReport(?,?)");
        $stmt->bindParam(1, $DecodedDepartmentIDs , \PDO::PARAM_STR);
        $stmt->bindParam(2, $DecodedYearIDs , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\MyNameSpace\AnnualReport\TeachingAndEnrollmentReport');
    }

    /**
     * @param $pkCourse
     * @return mixed
     */
    public function deleteCourse( $pkCourse )
    {
        $stmt = $this->pdo->prepare("CALL spDeleteCourse(?)");
        $stmt->bindParam(1, $pkCourse , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * @param $sTerm
     * @return mixed
     */
    public function deleteStrmData( $sTerm )
    {
        $stmt = $this->pdo->prepare("CALL  spDeleteStrmData(?)");
        $stmt->bindParam(1, $sTerm , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function increaseTimeOutForPayloadImport( $seconds )
    {
        $this->pdo->setAttribute( \PDO::ATTR_TIMEOUT , $seconds );
        $this->pdo->setAttribute(  \PDO::ATTR_ERRMODE , \PDO::ERRMODE_EXCEPTION);
    }
}