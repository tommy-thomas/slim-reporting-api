<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/24/2016
 * Time: 3:58 PM
 */

namespace MyNameSpace\AnnualReport;


class PublicationDAO extends BaseDAO
{
    public function getPublications($pkFaculty,$pkReport,$pkAcademicYear)
    {
        $stmt = $this->pdo->prepare("CALL spGetPublications(?,?,?)");
        $stmt->bindParam(1, $pkFaculty , \PDO::PARAM_INT);
        $stmt->bindParam(2, $pkReport , \PDO::PARAM_INT);
        $stmt->bindParam(3, $pkAcademicYear , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class );
    }

    public function getPublicationTypes()
    {
        $stmt = $this->pdo->prepare("CALL spGetPublicationTypes()");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,  '\MyNameSpace\AnnualReport\PublicationType' );
    }

    public function getPublicationStatusTypes()
    {
        $stmt = $this->pdo->prepare("CALL spGetPublicationStatusTypes()");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,  '\MyNameSpace\AnnualReport\PublicationStatusType' );
    }

    public function getPublicationCategories()
    {
        $stmt = $this->pdo->prepare("CALL spGetPublicationCategories()");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,  '\MyNameSpace\AnnualReport\PublicationCategory' );
    }

    public function updatePublication($pkPublication, $pkReport,$fkPublicationType,$fkPublicationCategory,$fkPublicationSatus,$PublicationTitle,$PublicationCitation,$PublicationUrl, $OriginalFileName, $SystemFileName, $EditedBy)
    {
        $stmt = $this->pdo->prepare("CALL spUpdatePublication(?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bindParam(1, $pkPublication , \PDO::PARAM_INT);
        $stmt->bindParam(2, $pkReport , \PDO::PARAM_INT);
        $stmt->bindParam(3, $fkPublicationType , \PDO::PARAM_INT);
        $stmt->bindParam(4, $fkPublicationCategory , \PDO::PARAM_INT);
        $stmt->bindParam(5, $fkPublicationSatus , \PDO::PARAM_INT);
        $stmt->bindParam(6, $PublicationTitle , \PDO::PARAM_STR);
        $stmt->bindParam(7, $PublicationCitation , \PDO::PARAM_STR);
        $stmt->bindParam(8, $PublicationUrl , \PDO::PARAM_STR);
        $stmt->bindParam(9, $OriginalFileName ,  \PDO::PARAM_STR);
        $stmt->bindParam(10, $SystemFileName ,  \PDO::PARAM_STR);
        $stmt->bindParam(11, $EditedBy , \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class );
    }

    public function deletePublication($pkPublication)
    {
        $stmt = $this->pdo->prepare("CALL spDeletePublication(?)");
        $stmt->bindParam(1, $pkPublication , \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}