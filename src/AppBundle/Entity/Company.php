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
}
