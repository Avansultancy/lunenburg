<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Artikel
 *
 * @ORM\Table(name="artikel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArtikelRepository")
 */
class Artikel
{
   /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToMany(targetEntity="Bestelorder", mappedBy="Artikel")
     * @ORM\JoinColumn(name="idArtikel", referencedColumnName= "id")
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="naam", type="string", length=100)
     */
    public $naam;

    /**
     * @var string
     *
     * @ORM\Column(name="omschrijving", type="text")
     */
    public $omschrijving;

    /**
     * @var string
     *
     * @ORM\Column(name="technischespecificatie", type="text")
     */
    public $technischespecificatie;

    /**
     * @var string
     *
     * @ORM\Column(name="inkoopprijs", type="decimal", precision=10, scale=0)
     */
    public $inkoopprijs;

    /**
    * @ORM\Column(name="magazijnlocatie", type="string")
    * @ORM\ManyToOne(targetEntity="magazijn", inversedBy="artikel")
    *@ORM\JoinColumn(name="id", referencedColumnName= "magazijnlocatie")
    */
    public $magazijnlocatie;

    /**
     * @var int
     *
     * @ORM\Column(name="minimale_voorraad", type="integer")
     */
    public $minimaleVoorraad;

    /**
     * @var int
     *
     * @ORM\Column(name="aantal_voorraad", type="integer")
     */
    public $aantalVoorraad;

    /**
     * @var int
     *
     * @ORM\Column(name="bestelserie", type="integer")
     */
    public $bestelserie;

    /**
     * @var int
     *
     * @ORM\Column(name="alternatief_artikel", type="integer")
     */
    public $alternatiefArtikel;


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
     * @return Artikel
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

    /**
     * Set omschrijving
     *
     * @param string $omschrijving
     *
     * @return Artikel
     */
    public function setOmschrijving($omschrijving)
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    /**
     * Get omschrijving
     *
     * @return string
     */
    public function getOmschrijving()
    {
        return $this->omschrijving;
    }

    /**
     * Set technischespecificatie
     *
     * @param string $technischespecificatie
     *
     * @return Artikel
     */
    public function setTechnischespecificatie($technischespecificatie)
    {
        $this->technischespecificatie = $technischespecificatie;

        return $this;
    }

    /**
     * Get technischespecificatie
     *
     * @return string
     */
    public function getTechnischespecificatie()
    {
        return $this->technischespecificatie;
    }

    /**
     * Set inkoopprijs
     *
     * @param string $inkoopprijs
     *
     * @return Artikel
     */
    public function setInkoopprijs($inkoopprijs)
    {
        $this->inkoopprijs = $inkoopprijs;

        return $this;
    }

    /**
     * Get inkoopprijs
     *
     * @return string
     */
    public function getInkoopprijs()
    {
        return $this->inkoopprijs;
    }

    /**
     * Set magazijnlocatie
     *
     * @param string $magazijnlocatie
     *
     * @return Artikel
     */
    public function setMagazijnlocatie($magazijnlocatie)
    {
        $this->magazijnlocatie = $magazijnlocatie;

        return $this;
    }

    /**
     * Get magazijnlocatie
     *
     * @return string
     */
    public function getMagazijnlocatie()
    {
        return $this->magazijnlocatie;
    }

    /**
     * Set minimaleVoorraad
     *
     * @param integer $minimaleVoorraad
     *
     * @return Artikel
     */
    public function setMinimaleVoorraad($minimaleVoorraad)
    {
        $this->minimaleVoorraad = $minimaleVoorraad;

        return $this;
    }

    /**
     * Get minimaleVoorraad
     *
     * @return int
     */
    public function getMinimaleVoorraad()
    {
        return $this->minimaleVoorraad;
    }

    /**
     * Set aantalVoorraad
     *
     * @param integer $aantalVoorraad
     *
     * @return Artikel
     */
    public function setAantalVoorraad($aantalVoorraad)
    {
        $this->aantalVoorraad = $aantalVoorraad;

        return $this;
    }

    /**
     * Get aantalVoorraad
     *
     * @return int
     */
    public function getAantalVoorraad()
    {
        return $this->aantalVoorraad;
    }

    /**
     * Set bestelserie
     *
     * @param integer $bestelserie
     *
     * @return Artikel
     */
    public function setBestelserie($bestelserie)
    {
        $this->bestelserie = $bestelserie;

        return $this;
    }

    /**
     * Get bestelserie
     *
     * @return int
     */
    public function getBestelserie()
    {
        return $this->bestelserie;
    }

    /**
     * Set alternatiefArtikel
     *
     * @param integer $alternatiefArtikel
     *
     * @return Artikel
     */
    public function setAlternatiefArtikel($alternatiefArtikel)
    {
        $this->alternatiefArtikel = $alternatiefArtikel;

        return $this;
    }

    /**
     * Get alternatiefArtikel
     *
     * @return int
     */
    public function getAlternatiefArtikel()
    {
        return $this->alternatiefArtikel;
    }

     public function __construct()
    {
        $this->id = new ArrayCollection();
    }


     public function __toString() {
     return (string) $this->id; }

}

