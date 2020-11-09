<?php

namespace AppBundle\Repository;

/**
 * Class CompanyRepository
 */
class CompanyRepository extends BaseRepository
{
    // TODO: modify it as needed

    public function findMaxRevenueByIndustry()
    {
        $em = $this->getEntityManager();

        $query = 'SELECT * from company comp where (lower(comp.industry),comp.revenue_billion) in (select lower(c.industry), MAX(c.revenue_billion) ' .
            'FROM company c GROUP BY LOWER(c.industry))';

        $statement = $em->getConnection()->prepare($query);
        // Set parameters
        $statement->execute();

        return $statement->fetchAll();
    }
}