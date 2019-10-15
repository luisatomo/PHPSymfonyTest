<?php

namespace AppBundle\Tests\Phpunit;

use Symfony\Bundle\FrameworkBundle\Client;
use Liip\FunctionalTestBundle\Test\WebTestCase;
use Symfony\Component\HttpKernel\KernelInterface;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Router;

/**
 * Class BaseApiTestCase
 * @package AppBundle\Tests\Phpunit
 */
abstract class BaseApiTestCase extends WebTestCase
{
    /**
     * @var
     */
    public $fixtures;
    public $clientManager;
    public $clientManagerClient;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @var Client
     */
    protected $client;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        self::bootKernel();

        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->client = static::createClient();

        $this->clientManager = $this->getContainer()->get('fos_oauth_server.client_manager.default');

        $this->clientManagerClient = $this->clientManager->findClientBy(['title' => 'test']);
    }

    /**
     * @param string $username
     * @param        string password
     *
     * @return string token
     * @throws OAuth2ServerException
     */
    public function getOAuthToken($username, $password)
    {
        $parameters = [
            'client_id'     => $this->clientManagerClient->getPublicId(),
            'client_secret' => $this->clientManagerClient->getSecret(),
            'grant_type'    => 'password',
            'username'      => $username,
            'password'      => $password,
        ];

        $response = $this->get('/oauth/v2/token', null, $parameters);
        $content  = json_decode($response->getContent());

        return $content->access_token;
    }

    /**
     * @param       $uri
     * @param       $accessToken
     * @param array $parameters
     *
     * @return null|\Symfony\Component\HttpFoundation\Response
     */
    protected function get($uri, $accessToken, array $parameters)
    {
        $response = $this->request('GET', $uri, $accessToken, $parameters);

        return $response;
    }

    /**
     * @param string $method
     * @param string $uri
     * @param string $accessToken
     * @param array  $parameters
     * @param array  $files
     *
     * @return null|\Symfony\Component\HttpFoundation\Response
     */
    protected function request($method, $uri, $accessToken, $parameters = [], $files = [])
    {
        $servers = [
            'CONTENT_TYPE' => 'application/json',
        ];

        if (!is_null($accessToken)) {
            $servers['HTTP_AUTHORIZATION'] = "Bearer {$accessToken}";
        }

        $this->client->request($method, $uri, $parameters, $files, $servers, null);

        $response = $this->client->getResponse();

        return $response;
    }

    /**
     * @param string $at
     *
     * @return string
     */
    public function getUniqueEmail($at = 'example.com')
    {
        return 'unique_email_' . time() . rand(100000, 1000000) . '@' . $at;
    }

    /**
     * @param       $uri
     * @param       $accessToken
     * @param array $parameters
     * @param array $files
     *
     * @return null|\Symfony\Component\HttpFoundation\Response
     */
    protected function post($uri, $accessToken, array $parameters, array $files = [])
    {
        $response = $this->request('POST', $uri, $accessToken, $parameters, $files);

        return $response;
    }

    /**
     * @param       $uri
     * @param       $accessToken
     * @param array $parameters
     * @param array $files
     *
     * @return null|\Symfony\Component\HttpFoundation\Response
     */
    protected function patch($uri, $accessToken, array $parameters, array $files = [])
    {
        $response = $this->request('PATCH', $uri, $accessToken, $parameters, $files);

        return $response;
    }

    /**
     * @param       $uri
     * @param       $accessToken
     * @param array $parameters
     *
     * @return null|\Symfony\Component\HttpFoundation\Response
     */
    protected function delete($uri, $accessToken, array $parameters)
    {
        $response = $this->request('DELETE', $uri, $accessToken, $parameters);

        return $response;
    }

    /**
     * @return KernelInterface
     */
    protected function getKernel()
    {
        $options = [
            'environment' => $this->environment,
        ];
        $kernel  = $this->createKernel($options);
        $kernel->boot();

        return $kernel;
    }

    /**
     * @param $reference
     *
     * @return mixed
     */
    protected function getAliceFixtureReference($reference)
    {
        return $this->fixtures[$reference];
    }

    /**
     * @return Router
     */
    protected function getRouter()
    {
        return $this->getContainer()->get('router');
    }

    /**
     * @param string $filename
     *
     * @return UploadedFile
     */
    protected function getTestAsset($filename = 'test_avatar_image.png')
    {
        $file = tempnam(sys_get_temp_dir(), 'upl'); // create file
        imagepng(imagecreatetruecolor(10, 10), $file); // create and write image/png to it

        return new UploadedFile($file, $filename, 'image/png', '10');
    }

    /**
     * @return void
     */
    private function purgeDatabase()
    {
        $purger = new ORMPurger($this->getContainer()->get('doctrine')->getManager());
        $purger->setPurgeMode(2);
        $purger->purge();
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();

        $this->em->close();
        $this->em = null; // avoid memory leaks
    }
}
