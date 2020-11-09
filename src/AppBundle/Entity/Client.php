<?php


namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Client
 *
 * Every  Client relates to a Company.
 * Every Client can have only 1 Company assigned, and every Company must belong to just 1 Client.
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClientRepository")
 * @ORM\Table(name="client")
 */
class Client
{
    // TODO: modify it as needed

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $email;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $phone;

    /**
     * @ORM\OneToOne(targetEntity=Company::class)
     */
    protected $company;

    /**
     * @ORM\OneToMany(targetEntity=ClientUser::class, mappedBy="client")
     */
    protected $clientUsers;

    public function __construct()
    {
        $this->clientUsers = new ArrayCollection();
    }

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Client
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
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
    public function setCompany(Company $company)
    {
        $this->company = $company;
    }

    /**
     * @return Collection|ClientUser[]
     */
    public function getClientUsers()
    {
        return $this->clientUsers;
    }

    public function addClientUser(ClientUser $clientUser)
    {
        if (!$this->clientUsers->contains($clientUser)) {
            $this->clientUsers[] = clientUser;
            $clientUser->setClient($this);
        }

        return $this;
    }

    public function removeClientUser(ClientUser $clientUser)
    {
        if ($this->clientUsers->contains($clientUser)) {
            $this->clientUsers->removeElement($clientUser);
            // set the owning side to null (unless already changed)
            if ($clientUser->getClient() === $this) {
                $clientUser->setClient(null);
            }
        }

        return $this;
    }


}
