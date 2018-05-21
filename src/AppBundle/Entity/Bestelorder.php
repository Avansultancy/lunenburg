<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Bestelorder
 *
 * @ORM\Table(name="bestelorder")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BestelorderRepository")
 */
class Bestelorder
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_leverancier", type="integer")
     * @ORM\ManyToOne(targetEntity="leverancier", inversedBy="Bestelorder")
     * @ORM\JoinColumn(name="id", referencedColumnName= "idLeverancier")
     */
    private $idLeverancier;

    /**
     * @var int
     *
     * @ORM\Column(name="id_artikel", type="integer")
     * @ORM\ManyToOne(targetEntity="Artikel", inversedBy="Bestelorder")
     * @ORM\JoinColumn(name="id", referencedColumnName= "idArtikel")
     */
    private $idArtikel;

    /**
     * @var int
     *
     * @ORM\Column(name="aantal", type="integer")
     */
    private $aantal;

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Bestelorder
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
     * Set idLeverancier
     *
     * @param integer $idLeverancier
     *
     * @return Bestelorder
     */
    public function setIdLeverancier($idLeverancier)
    {
        $this->idLeverancier = $idLeverancier;

        return $this;
    }

    /**
     * Get idLeverancier
     *
     * @return int
     */
    public function getIdLeverancier()
    {
        return $this->idLeverancier;
    }

    /**
     * Set idArtikel
     *
     * @param integer $idArtikel
     *
     * @return Bestelorder
     */
    public function setIdArtikel($idArtikel)
    {
        $this->idArtikel = $idArtikel;

        return $this;
    }

    /**
     * Get idArtikel
     *
     * @return int
     */
    public function getIdArtikel()
    {
        return $this->idArtikel;
    }

    /**
     * Set aantal
     *
     * @param integer $aantal
     *
     * @return Bestelorder
     */
    public function setAantal($aantal)
    {
        $this->aantal = $aantal;

        return $this;
    }

    /**
     * Get aantal
     *
     * @return int
     */
    public function getAantal()
    {
        return $this->aantal;
    }

     public function __construct()
    {
        $this->bestelorder = new ArrayCollection();
    }
}

