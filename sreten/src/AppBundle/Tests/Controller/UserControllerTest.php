<?php


namespace AppBundle\Controller;

use AppBundle\Tests\Phpunit\BaseApiTestCase;
/**
 * Class UserControllerTest
 * @package AppBundle\Controller
 */
class UserControllerTest extends BaseApiTestCase
{

    public function testUserProfileGet()
    {
        $accessToken        = $this->getOAuthToken('admin1', 'admin1');
        $method             = 'GET';
        $uri                = '/user/profile';
        $parameters         = [];
        $response           = $this->request($method, $uri, $accessToken, $parameters);

        $this->assertTrue($response->isSuccessful());
    }

}