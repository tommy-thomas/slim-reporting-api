<?php
/**
 * Created by PhpStorm.
 * User: tommyt
 * Date: 8/21/2016
 * Time: 10:42 PM
 */

namespace MyNameSpace\AnnualReport;


class QuarterDAO extends BaseDAO
{
    /**
     * @param $report_id
     * @return Report
     */
    public function getQuarters()
    {
        $stmt = $this->pdo->prepare("CALL spGetQuarters()");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->class);
    }
}