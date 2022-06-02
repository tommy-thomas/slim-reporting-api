<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 10/12/2016
 * Time: 10:02 AM
 */

namespace MyNameSpace\AnnualReport;


class ResidentStatusTypeDAO extends BaseDAO
{
    public function getResidentStatusTypes()
    {
        $stmt = $this->pdo->prepare("CALL spGetResidentStatusTypes()");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class);
    }
}