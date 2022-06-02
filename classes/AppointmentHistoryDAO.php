<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/29/2016
 * Time: 11:00 AM
 */

namespace MyNameSpace\AnnualReport;


class AppointmentHistoryDAO extends BaseDAO
{
    public function getAppointmentHistory( $pkFaculty)
    {
        $stmt = $this->pdo->prepare("CALL spGetAppointmentHistory(?)");
        $stmt->bindParam(1, $pkFaculty , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class);
    }

    public function updateAppointmentHistory($pkAppointmentHistory,$fkFaculty,$fkFacultyRank,$fkFacultyTrack,$AppointmentHistoryStartDate,$AppointmentHistoryEndDate)
    {
        $StartDate = $this->UserInputToDate($AppointmentHistoryStartDate);
        $EndDate = $this->UserInputToDate($AppointmentHistoryEndDate);
        $stmt = $this->pdo->prepare("CALL spUpdateAppointmentHistory(?,?,?,?,?,?)");
        $stmt->bindParam(1, $pkAppointmentHistory , \PDO::PARAM_INT);
        $stmt->bindParam(2, $fkFaculty , \PDO::PARAM_INT);
        $stmt->bindParam(3, $fkFacultyRank , \PDO::PARAM_INT);
        $stmt->bindParam(4, $fkFacultyTrack , \PDO::PARAM_INT);
        $stmt->bindParam(5, $StartDate);
        $stmt->bindParam(6, $EndDate);
        $stmt->execute();
        return $stmt->fetchObject($this->class);
    }

    public function getAllFacultyRanks()
    {
        $stmt = $this->pdo->prepare("CALL spGetAllFacultyRanks()");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\MyNameSpace\AnnualReport\FacultyRank');
    }

    public function getAllFacultyTracks()
    {
        $stmt = $this->pdo->prepare("CALL spGetAllFacultyTracks()");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, '\MyNameSpace\AnnualReport\FacultyTrack');
    }

    public function deleteAppointmentHistory( $pkAppointmentHistory )
    {
        $stmt = $this->pdo->prepare("CALL spDeleteAppointmentHistory(?)");
        $stmt->bindParam(1, $pkAppointmentHistory , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}