<?php

namespace AppBundle\Manager;

use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;
use JMS\DiExtraBundle\Annotation\Service;
use AppBundle\Model\UserInterface;
use AppBundle\Entity\OAuth\Client;
use FOS\OAuthServerBundle\Model\TokenManagerInterface;
use FOS\OAuthServerBundle\Model\ClientManagerInterface;
use FOS\OAuthServerBundle\Model\TokenInterface;
use OAuth2\OAuth2;

/**
 * @Service("access_token_manager")
 */
class AccessTokenManager
{
    /**
     * @var TokenManagerInterface
     */
    protected $oAuthAccessTokenManager;

    /**
     * @var ClientManagerInterface
     */
    protected $oAuthClientManager;

    /**
     * @var OAuth2
     */
    protected $oAuthServer;

    /**
     * @var array
     */
    protected $oAuthOptions;

    /**
     * @InjectParams({
     *      "oAuthAccessTokenManager" = @Inject("fos_oauth_server.access_token_manager"),
     *      "oAuthClientManager" = @Inject("fos_oauth_server.client_manager.default"),
     *      "oAuthServer" = @Inject("fos_oauth_server.server"),
     *      "oAuthOptions" = @Inject("%fos_oauth_server.server.options%")
     * })
     */
    public function __construct(TokenManagerInterface $oAuthAccessTokenManager, ClientManagerInterface $oAuthClientManager, OAuth2 $oAuthServer, $oAuthOptions)
    {
        $this->oAuthAccessTokenManager  = $oAuthAccessTokenManager;
        $this->oAuthClientManager       = $oAuthClientManager;
        $this->oAuthServer              = $oAuthServer;
        $this->oAuthOptions             = $oAuthOptions;
    }

    /**
     * @param UserInterface $user
     * @param Client $client
     * @return array
     */
    public function create(UserInterface $user, Client $client = null)
    {
        if ($client == null) {
            $client = $this->oAuthClientManager->findClientBy(['title' => 'test']);
        }

        $accessTokenLifetime    = $this->oAuthOptions['access_token_lifetime'];
        $refreshTokenLifetime   = $this->oAuthOptions['refresh_token_lifetime'];
        $token                  = $this->oAuthServer->createAccessToken($client, $user, 'default', $accessTokenLifetime, true, $refreshTokenLifetime);

        return $token;
    }

    /**
     * @param $token
     * @return array
     */
    public function getAccessToken($token)
    {
        $accessTokenLifetime    = $this->oAuthOptions['access_token_lifetime'];
        $refreshTokenLifetime   = $this->oAuthOptions['refresh_token_lifetime'];

        return [
            'access_token'              => $token['access_token'],
            'access_token_expires_at'   => new \DateTime('+' . $accessTokenLifetime . ' seconds', new \DateTimeZone("UTC")),
            'refresh_token'             => $token['refresh_token'],
            'refresh_token_expires_at'  => new \DateTime('+' . $refreshTokenLifetime . ' seconds', new \DateTimeZone("UTC"))
        ];
    }
}
