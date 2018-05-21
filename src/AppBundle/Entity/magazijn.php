<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * magazijn
 *
 * @ORM\Table(name="magazijn")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\magazijnRepository")
 */
class magazijn
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToMany(targetEntity="artikel", mappedBy="magazijn")
     * @ORM\JoinColumn(name="magazijnlocatie", referencedColumnName= "id")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="locatienummer", type="string", length=100)
     */
    private $locatienummer;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set locatienummer
     *
     * @param string $locatienummer
     *
     * @return magazijn
     */
    public function setLocatienummer($locatienummer)
    {
        $this->locatienummer = $locatienummer;

        return $this;
    }

    /**
     * Get locatienummer
     *
     * @return string
     */
    public function getLocatienummer()
    {
        return $this->locatienummer;
    }

     public function __construct()
    {
        $this->id = new ArrayCollection();
    }


     public function __toString() {
     return (string) $this->id; }
}

