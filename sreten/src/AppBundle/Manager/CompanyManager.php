<?php


namespace AppBundle\Manager;

use AppBundle\Repository\CompanyRepository;
use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;
use JMS\DiExtraBundle\Annotation\Service;

/**
 * @Service("entity_manager")
 */
class CompanyManager extends BaseManager
{
    /**
     * @InjectParams({
     *      "entityRepository" = @Inject("company_repository")
     * })
     *
     * @param CompanyRepository $companyRepository
     */
    public function __construct(CompanyRepository $companyRepository)
    {
        $this->repository           = $companyRepository;
    }
}