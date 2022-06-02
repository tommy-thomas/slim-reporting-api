<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/29/2016
 * Time: 12:58 PM
 */

namespace MyNameSpace\AnnualReport;


class ResearchLeaveDAO extends BaseDAO
{
    /**
     * @param $pkFaculty
     * @return ResearchLeave
     */
    public function getResearchLeave( $pkFaculty)
    {
        $stmt = $this->pdo->prepare("CALL spGetResearchLeave(?)");
        $stmt->bindParam(1, $pkFaculty , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class);
    }

    public function getResearchLeaveTypes()
    {
        $stmt = $this->pdo->prepare("CALL spGetResearchLeaveTypes()");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,  '\MyNameSpace\AnnualReport\ResearchLeaveType' );
    }

    /**
     * @param $pkResearchLeave
     * @param $fkFaculty
     * @param $fkAcademicYear
     * @param $QuarterIDs (1|2|3)
     * @param $fkResearchLeaveType
     * @param $FellowshipName
     * @param $FellowshipAmount
     * @param $Comments
     * @return mixed
     */
    public function updateResearchLeave($pkResearchLeave , $fkFaculty , $fkAcademicYear , $QuarterIDs , $fkResearchLeaveType , $FellowshipName, $FellowshipAmount, $Comments)
    {
        $stmt = $this->pdo->prepare("CALL spUpdateResearchLeave(?,?,?,?,?,?,?,?)");
        $stmt->bindParam(1, $pkResearchLeave , \PDO::PARAM_INT);
        $stmt->bindParam(2, $fkFaculty , \PDO::PARAM_INT);
        $stmt->bindParam(3, $fkAcademicYear , \PDO::PARAM_INT);
        $stmt->bindParam(4, $QuarterIDs , \PDO::PARAM_STR);
        $stmt->bindParam(5, $fkResearchLeaveType , \PDO::PARAM_INT);
        $stmt->bindParam(6, $FellowshipName , \PDO::PARAM_STR);
        $stmt->bindParam(7, $FellowshipAmount , \PDO::PARAM_INT);
        $stmt->bindParam(8, $Comments , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject($this->class);
    }

    /**
     * @param $pk_research
     * @return message array
     */
    public function deleteResearchLeave( $pkResearchLeave )
    {
        $stmt = $this->pdo->prepare("CALL spDeleteResearchLeave(?)");
        $stmt->bindParam(1, $pkResearchLeave , \PDO::PARAM_INT );
        $stmt->execute();
        return $stmt->fetchAll();
    }
}