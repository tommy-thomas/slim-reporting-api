<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/24/2016
 * Time: 3:15 PM
 */

namespace MyNameSpace\AnnualReport;


class ProfessionalServiceDAO extends BaseDAO
{
    /**
     * @param $report_id
     * @return ProfessionalService
     */
    public function getProfessionalServices( $pkFaculty , $pkReport  , $pkAcademicYear )
    {
        $stmt = $this->pdo->prepare("CALL spGetProfessionalServices(?,?,?)");
        $stmt->bindParam(1, $pkFaculty , \PDO::PARAM_INT);
        $stmt->bindParam(2, $pkReport , \PDO::PARAM_INT);
        $stmt->bindParam(3, $pkAcademicYear , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class );
    }

    public function getProfessionalServiceTypes()
    {
        $stmt = $this->pdo->prepare("CALL spGetProfessionalServiceTypes()");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,  '\MyNameSpace\AnnualReport\ProfessionalServiceType' );
    }

    /**
     * @param $service_id
     * @param $pkReport
     * @param $fkProfessionalServiceType
     * @param $ProfessionalServiceDescription
     * @param $ProfessionalServiceLocation
     * @param $AddToNextYearsReport
     * @return ProfessionalService
     */
    public function updateProfessionalService( $pkProfessionalService , $pkReport , $fkProfessionalServiceType, $ProfessionalServiceDescription , $ProfessionalServiceLocation , $AddToNextYearsReport, $EditedBy)
    {
        $stmt = $this->pdo->prepare("CALL spUpdateProfessionalService(?,?,?,?,?,?,?)");
        $stmt->bindParam(1, $pkProfessionalService , \PDO::PARAM_INT);
        $stmt->bindParam(2, $pkReport , \PDO::PARAM_INT);
        $stmt->bindParam(3, $fkProfessionalServiceType , \PDO::PARAM_INT);
        $stmt->bindParam(4, $ProfessionalServiceDescription, \PDO::PARAM_STR);
        $stmt->bindParam(5, $ProfessionalServiceLocation , \PDO::PARAM_STR);
        $stmt->bindParam(6, $AddToNextYearsReport , \PDO::PARAM_BOOL);
        $stmt->bindParam(7, $EditedBy , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject( $this->class );
    }

    /**
     * @param $service_id
     * @return string
     */
    public function deleteProfessionalService( $pkProfessionalService )
    {
        $stmt = $this->pdo->prepare("CALL spDeleteProfessionalService(?)");
        $stmt->bindParam(1, $pkProfessionalService , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}