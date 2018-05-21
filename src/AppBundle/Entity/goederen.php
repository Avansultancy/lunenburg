<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * goederen
 *
 * @ORM\Table(name="goederen")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\goederenRepository")
 */
class goederen
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
     * @ORM\Column(name="hoeveelheid", type="integer")
     */
    private $hoeveelheid;

    /**
     * @var string
     *
     * @ORM\Column(name="kwaliteit", type="string", length=100)
     */
    private $kwaliteit;

    /**
     * @var string
     *
     * @ORM\Column(name="beschrijving", type="text")
     */
    private $beschrijving;

    /**
     * @var int
     *
     * @ORM\Column(name="id_artikel", type="integer")
     */
    private $idArtikel;

    /**
     * @var int
     *
     * @ORM\Column(name="leverancier_id", type="integer")
     */
    private $leverancierId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ontvangstdatum", type="date")
     */
    private $ontvangstdatum;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;


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
     * Set hoeveelheid
     *
     * @param integer $hoeveelheid
     *
     * @return goederen
     */
    public function setHoeveelheid($hoeveelheid)
    {
        $this->hoeveelheid = $hoeveelheid;

        return $this;
    }

    /**
     * Get hoeveelheid
     *
     * @return int
     */
    public function getHoeveelheid()
    {
        return $this->hoeveelheid;
    }

    /**
     * Set kwaliteit
     *
     * @param string $kwaliteit
     *
     * @return goederen
     */
    public function setKwaliteit($kwaliteit)
    {
        $this->kwaliteit = $kwaliteit;

        return $this;
    }

    /**
     * Get kwaliteit
     *
     * @return string
     */
    public function getKwaliteit()
    {
        return $this->kwaliteit;
    }

    /**
     * Set beschrijving
     *
     * @param string $beschrijving
     *
     * @return goederen
     */
    public function setBeschrijving($beschrijving)
    {
        $this->beschrijving = $beschrijving;

        return $this;
    }

    /**
     * Get beschrijving
     *
     * @return string
     */
    public function getBeschrijving()
    {
        return $this->beschrijving;
    }

    /**
     * Set idArtikel
     *
     * @param integer $idArtikel
     *
     * @return goederen
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
     * Set leverancierId
     *
     * @param integer $leverancierId
     *
     * @return goederen
     */
    public function setLeverancierId($leverancierId)
    {
        $this->leverancierId = $leverancierId;

        return $this;
    }

    /**
     * Get leverancierId
     *
     * @return int
     */
    public function getLeverancierId()
    {
        return $this->leverancierId;
    }

    /**
     * Set ontvangstdatum
     *
     * @param \DateTime $ontvangstdatum
     *
     * @return goederen
     */
    public function setOntvangstdatum($ontvangstdatum)
    {
        $this->ontvangstdatum = $ontvangstdatum;

        return $this;
    }

    /**
     * Get ontvangstdatum
     *
     * @return \DateTime
     */
    public function getOntvangstdatum()
    {
        return $this->ontvangstdatum;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return goederen
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }
}

