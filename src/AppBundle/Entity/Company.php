<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Company
 *
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CompanyRepository")
 * @ORM\Table(name="company")
 */
class Company
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     */
    protected $name;

    /**
     * @ORM\Column(type="text")
     */
    protected $industry;

    /**
     * @ORM\Column(type="decimal")
     */
    protected $revenueBillion;

    /**
     * @ORM\Column(type="decimal")
     */
    protected $marketCapitalBillion;

    /**
     * @ORM\Column(type="integer")
     */
    protected $employees;

    /**
     * @ORM\Column(type="text")
     */
    protected $headquarters;

    /**
     * @ORM\Column(type="text")
     */
    protected $contactEmail;

    /**
     * @ORM\ManyToOne(targetEntity="Company")
     */
    protected $parentCompany;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getIndustry()
    {
        return $this->industry;
    }

    /**
     * @param mixed $industry
     */
    public function setIndustry($industry)
    {
        $this->industry = $industry;
    }

    /**
     * @return mixed
     */
    public function getRevenueBillion()
    {
        return $this->revenueBillion;
    }

    /**
     * @param mixed $revenueBillion
     */
    public function setRevenueBillion($revenueBillion)
    {
        $this->revenueBillion = $revenueBillion;
    }

    /**
     * @return mixed
     */
    public function getMarketCapitalBillion()
    {
        return $this->marketCapitalBillion;
    }

    /**
     * @param mixed $marketCapitalBillion
     */
    public function setMarketCapitalBillion($marketCapitalBillion)
    {
        $this->marketCapitalBillion = $marketCapitalBillion;
    }

    /**
     * @return mixed
     */
    public function getEmployees()
    {
        return $this->employees;
    }

    /**
     * @param mixed $employees
     */
    public function setEmployees($employees)
    {
        $this->employees = $employees;
    }

    /**
     * @return mixed
     */
    public function getHeadquarters()
    {
        return $this->headquarters;
    }

    /**
     * @param mixed $headquarters
     */
    public function setHeadquarters($headquarters)
    {
        $this->headquarters = $headquarters;
    }

    /**
     * @return mixed
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    /**
     * @param mixed $contactEmail
     */
    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = $contactEmail;
    }

    /**
     * @return mixed
     */
    public function getParentCompany()
    {
        return $this->parentCompany;
    }

    /**
     * @param mixed $parentCompany
     */
    public function setParentCompany($parentCompany)
    {
        $this->parentCompany = $parentCompany;
    }
}
