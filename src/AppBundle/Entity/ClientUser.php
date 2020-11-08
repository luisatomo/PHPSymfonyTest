<?php


namespace AppBundle\Entity;

use AppBundle\Entity\Traits\CommonTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Client User
 *
 * Every  Client relates to a Company.
 * Every Client can have only 1 Company assigned, and every Company must belong to just 1 Client.
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClientUserRepository")
 * @ORM\Table(name="client_user")
 */
class ClientUser
{
    // TODO: modify it as needed
    /**
     * Common Trait, in case we need to reuse the fields that are inside like
     * CreatedAt, UpdatedAt, DeletedAt fields
     */
    use CommonTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="clientUsers")
     */
    protected $client;

    /**
     * @ORM\OneToOne(targetEntity="User")
     */
    private $user;

    /**
     * @ORM\Column(type="boolean")
     */

    protected $active;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return Client
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }
}
