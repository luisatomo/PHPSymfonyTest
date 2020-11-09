<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Company;
use AppBundle\Entity\User;
use AppBundle\Manager\UserManager;
use FOS\RestBundle\Request\ParamFetcher;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as FOS;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use FOS\RestBundle\Controller\Annotations\QueryParam;

/**
 * Class CompanyController
 *
 * @FOS\Prefix("/company")
 * @FOS\NamePrefix("company_")
 */
class CompanyController extends FOSRestController
{

    /**
     * Find Companies with Max Revenue by Industry
     *
     * ### Response ###
     *  <code>
     *       "Companies": [{

     *       }]
     * </code>
     *
     * @ApiDoc(
     *     section = "Company",
     *     description="Returns companies with the max revenue on its industries",
     *     statusCodes={200 = "OK", 400 = "Bad request"},
     *     resource=true
     * )
     *
     * @FOS\Route("/companies-with-max-revenue", methods={"GET"}, name="find_by_max_revenue")
     *
     * @FOS\View(serializerGroups={})
     * @return companies[]
     */
    public function findMaxRevenueByIndustryAction()
    {
        $em = $this->getDoctrine()->getManager();
        $companies = $em->getRepository(Company::class)->findMaxRevenueByIndustry();

        return $companies;
    }


}
