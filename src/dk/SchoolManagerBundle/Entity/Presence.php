<?php

namespace dk\SchoolManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Presence
 *
 * @ORM\Table(name="presence", indexes={@ORM\Index(name="FK_ETRE", columns={"IDPERSONNE"}), @ORM\Index(name="FK_JUSTIFIER", columns={"IDPLANNING"})})
 * @ORM\Entity(repositoryClass="dk\SchoolManagerBundle\Entity\PresenceRepository")
 */
class Presence
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDPRESENCE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATEANNULATION", type="date", nullable=true)
     */
    private $dateannulation;

    /**
     * @var string
     *
     * @ORM\Column(name="MOTIFANNULATION", type="string", length=55, nullable=true)
     */
    private $motifannulation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATEREPORT", type="date", nullable=true)
     */
    private $datereport;

    /**
     * @var \Planning
     *
     * @ORM\ManyToOne(targetEntity="Planning")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDPLANNING", referencedColumnName="IDPLANNING")
     * })
     */
    private $idplanning;

    /**
     * @var \Personne
     *
     * @ORM\ManyToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDPERSONNE", referencedColumnName="IDPERSONNE")
     * })
     */
    private $idpersonne;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateannulation
     *
     * @param \DateTime $dateannulation
     * @return Presence
     */
    public function setDateannulation($dateannulation)
    {
        $this->dateannulation = $dateannulation;

        return $this;
    }

    /**
     * Get dateannulation
     *
     * @return \DateTime 
     */
    public function getDateannulation()
    {
        return $this->dateannulation;
    }

    /**
     * Set motifannulation
     *
     * @param string $motifannulation
     * @return Presence
     */
    public function setMotifannulation($motifannulation)
    {
        $this->motifannulation = $motifannulation;

        return $this;
    }

    /**
     * Get motifannulation
     *
     * @return string 
     */
    public function getMotifannulation()
    {
        return $this->motifannulation;
    }

    /**
     * Set datereport
     *
     * @param \DateTime $datereport
     * @return Presence
     */
    public function setDatereport($datereport)
    {
        $this->datereport = $datereport;

        return $this;
    }

    /**
     * Get datereport
     *
     * @return \DateTime 
     */
    public function getDatereport()
    {
        return $this->datereport;
    }

    /**
     * Set idplanning
     *
     * @param \dk\SchoolManagerBundle\Entity\Planning $idplanning
     * @return Presence
     */
    public function setIdplanning(\dk\SchoolManagerBundle\Entity\Planning $idplanning = null)
    {
        $this->idplanning = $idplanning;

        return $this;
    }

    /**
     * Get idplanning
     *
     * @return \dk\SchoolManagerBundle\Entity\Planning 
     */
    public function getIdplanning()
    {
        return $this->idplanning;
    }

    /**
     * Set idpersonne
     *
     * @param \dk\SchoolManagerBundle\Entity\Personne $idpersonne
     * @return Presence
     */
    public function setIdpersonne(\dk\SchoolManagerBundle\Entity\Personne $idpersonne = null)
    {
        $this->idpersonne = $idpersonne;

        return $this;
    }

    /**
     * Get idpersonne
     *
     * @return \dk\SchoolManagerBundle\Entity\Personne 
     */
    public function getIdpersonne()
    {
        return $this->idpersonne;
    }
}
