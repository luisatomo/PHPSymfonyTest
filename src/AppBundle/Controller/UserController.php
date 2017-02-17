<?php


namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\User;
use AppBundle\Manager\UserManager;
use FOS\RestBundle\Request\ParamFetcher;
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
 * Class UserController
 *
 *
 * @FOS\Prefix("/user")
 * @FOS\NamePrefix("user_")
 */
class UserController extends FOSRestController
{
    /**
     * Get user profile info.
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
     *     section = "User",
     *     description="Get user profile info.",
     *     statusCodes={200 = "OK", 400 = "Bad request"},
     *     resource=true
     * )
     *
     * @FOS\Route("/profile")
     * @FOS\View(serializerGroups={
     *     "profileFields"
     * })
     *
     * @return array
     */
    public function getAction(ParamFetcher $paramFetcher)
    {
        return $this->getUser();
    }

}
