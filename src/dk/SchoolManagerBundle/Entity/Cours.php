<?php

namespace dk\SchoolManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cours
 *
 * @ORM\Table(name="cours", indexes={@ORM\Index(name="FK_COUTER", columns={"IDTARIF"})})
 * @ORM\Entity
 */
class Cours
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDCOURS", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="TYPECOURS", type="string", length=20, nullable=false)
     */
    private $typecours;

    /**
     * @var time
     *
     * @ORM\Column(name="DUREECOURS", type="time", nullable=false)
     */
    private $dureecours;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DEBUTSESSION", type="date", nullable=true)
     */
    private $debutsession;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FINSESSION", type="date", nullable=true)
     */
    private $finsession;

    /**
     * @var \Tarif
     *
     * @ORM\ManyToOne(targetEntity="Tarif")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDTARIF", referencedColumnName="IDTARIF")
     * })
     */
    private $idtarif;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Discipline", mappedBy="idcours")
     */
    private $iddiscipline;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Inscription", mappedBy="idcours")
     */
    private $idinscription;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->iddiscipline = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idinscription = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set typecours
     *
     * @param string $typecours
     * @return Cours
     */
    public function setTypecours($typecours)
    {
        $this->typecours = $typecours;

        return $this;
    }

    /**
     * Get typecours
     *
     * @return string 
     */
    public function getTypecours()
    {
        return $this->typecours;
    }

    /**
     * Set dureecours
     *
     * @param \DateTime $dureecours
     * @return Cours
     */
    public function setDureecours($dureecours)
    {
        $this->dureecours = $dureecours;

        return $this;
    }

    /**
     * Get dureecours
     *
     * @return \DateTime 
     */
    public function getDureecours()
    {
        return $this->dureecours;
    }

    /**
     * Set debutsession
     *
     * @param \DateTime $debutsession
     * @return Cours
     */
    public function setDebutsession($debutsession)
    {
        $this->debutsession = $debutsession;

        return $this;
    }

    /**
     * Get debutsession
     *
     * @return \DateTime 
     */
    public function getDebutsession()
    {
        return $this->debutsession;
    }

    /**
     * Set finsession
     *
     * @param \DateTime $finsession
     * @return Cours
     */
    public function setFinsession($finsession)
    {
        $this->finsession = $finsession;

        return $this;
    }

    /**
     * Get finsession
     *
     * @return \DateTime 
     */
    public function getFinsession()
    {
        return $this->finsession;
    }

    /**
     * Set idtarif
     *
     * @param \dk\SchoolManagerBundle\Entity\Tarif $idtarif
     * @return Cours
     */
    public function setId(\dk\SchoolManagerBundle\Entity\Tarif $idtarif = null)
    {
        $this->idtarif = $idtarif;

        return $this;
    }

    /**
     * Get idtarif
     *
     * @return \dk\SchoolManagerBundle\Entity\Tarif 
     */
    public function getIdtarif()
    {
        return $this->idtarif;
    }

    /**
     * Add iddiscipline
     *
     * @param \dk\SchoolManagerBundle\Entity\Discipline $iddiscipline
     * @return Cours
     */
    public function addIddiscipline(\dk\SchoolManagerBundle\Entity\Discipline $iddiscipline)
    {
        $this->iddiscipline[] = $iddiscipline;

        return $this;
    }

    /**
     * Remove iddiscipline
     *
     * @param \dk\SchoolManagerBundle\Entity\Discipline $iddiscipline
     */
    public function removeIddiscipline(\dk\SchoolManagerBundle\Entity\Discipline $iddiscipline)
    {
        $this->iddiscipline->removeElement($iddiscipline);
    }

    /**
     * Get iddiscipline
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIddiscipline()
    {
        return $this->iddiscipline;
    }

    /**
     * Add idinscription
     *
     * @param \dk\SchoolManagerBundle\Entity\Inscription $idinscription
     * @return Cours
     */
    public function addIdinscription(\dk\SchoolManagerBundle\Entity\Inscription $idinscription)
    {
        $this->idinscription[] = $idinscription;

        return $this;
    }

    /**
     * Remove idinscription
     *
     * @param \dk\SchoolManagerBundle\Entity\Inscription $idinscription
     */
    public function removeIdinscription(\dk\SchoolManagerBundle\Entity\Inscription $idinscription)
    {
        $this->idinscription->removeElement($idinscription);
    }

    /**
     * Get idinscription
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdinscription()
    {
        return $this->idinscription;
    }
    
    public function __toString()
    {
        return $this->typecours;
    }

    /**
     * Set idtarif
     *
     * @param \dk\SchoolManagerBundle\Entity\Tarif $idtarif
     * @return Cours
     */
    public function setIdtarif(\dk\SchoolManagerBundle\Entity\Tarif $idtarif = null)
    {
        $this->idtarif = $idtarif;

        return $this;
    }
}
