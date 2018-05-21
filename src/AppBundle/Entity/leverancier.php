<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * leverancier
 *
 * @ORM\Table(name="leverancier")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\leverancierRepository")
 */
class leverancier
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToMany(targetEntity="bestelorder", mappedBy="leverancier")
     * @ORM\JoinColumn(name="idLeverancier", referencedColumnName= "id")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="naam", type="string", length=100)
     */
    private $naam;


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
     * Set naam
     *
     * @param string $naam
     *
     * @return leverancier
     */
    public function setNaam($naam)
    {
        $this->naam = $naam;

        return $this;
    }

    /**
     * Get naam
     *
     * @return string
     */
    public function getNaam()
    {
        return $this->naam;
    }

     public function __construct()
    {
        $this->id = new ArrayCollection();
    }


     public function __toString() {
     return (string) $this->id; }
}

