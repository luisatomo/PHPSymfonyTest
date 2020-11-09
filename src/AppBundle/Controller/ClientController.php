<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Client;
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
 * Class ClientController
 *
 * @FOS\Prefix("/client")
 * @FOS\NamePrefix("client_")
 */
class ClientController extends FOSRestController
{
    /**
     * ---------------------------------------
     * -- MAKE ALL THE CHANGES YOU SEE FIT. --
     * ---------------------------------------
     */

    /**
     * Get Client detail
     *
     * ### Response ###
     *  <code>
     *       "user": {
     *         "id": ##,
     *         "email": string,
     *         "username": string,
     *         "firstname": string,
     *         "lastname": string,
     *       }
     * </code>
     *
     * @ApiDoc(
     *     section = "Client",
     *     description="Get user profile info.",
     *     statusCodes={200 = "OK", 400 = "Bad request"},
     *     resource=true
     * )
     *
     * @FOS\Route("/{id}", requirements={"id"="\d+"}, methods={"GET"}, name="detail")
     *
     * @FOS\View(serializerGroups={"Client"})
     *
     * @return Client
     */
    public function getDetailAction($id)
    {
        return new Client();
    }

    /**
     * Creates a new Client
     *
     * ### Response ###
     *  <code>
     *       "client": {
     *         "name": string,
     *         "email": string,
     *         "phone": string,
     *         "company": integer,
     *       }
     * </code>
     *
     * @ApiDoc(
     *     section = "Client",
     *     description="Creates a new Client",
     *     statusCodes={200 = "OK", 400 = "Bad request"},
     *     resource=true
     * )
     *
     * @FOS\Route("/new", methods={"POST"}, name="new")
     * @ParamConverter("client", converter="fos_rest.request_body", options={"deserializationContext"={"CompanyAware"=false}})
     *
     * @FOS\View(serializerEnableMaxDepthChecks=true, serializerGroups={"Client"})
     *
     * @param Client $client
     * @return Client
     */
    public function newAction(Client $client)
    {
        $em = $this->getDoctrine()->getManager();
        $company = $em->getRepository(Company::class)->findOneBy(['id' => $client->getCompany()->getId()]);
        $client->setCompany($company);
        $em->persist($client);
        $em->flush();

        return $client;
    }
}
