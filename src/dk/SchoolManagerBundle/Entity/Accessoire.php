<?php

namespace dk\SchoolManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Accessoire
 *
 * @ORM\Table(name="accessoire", indexes={@ORM\Index(name="FK_AVOIR_UN_PRIX", columns={"IDTARIF"}), @ORM\Index(name="FK_DISPOSER", columns={"IDPERSONNE"})})
 * @ORM\Entity
 */
class Accessoire
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDACCESSOIRE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMACCESSOIRE", type="string", length=55, nullable=false)
     */
    private $nomaccessoire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DEBUTLOCATION", type="date", nullable=true)
     */
    private $debutlocation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FINLOCATION", type="date", nullable=true)
     */
    private $finlocation;

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
     * @ORM\ManyToMany(targetEntity="Paiement", inversedBy="idaccessoire")
     * @ORM\JoinTable(name="paiementaccessoire",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IDACCESSOIRE", referencedColumnName="IDACCESSOIRE")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IDPAIMENT", referencedColumnName="IDPAIMENT")
     *   }
     * )
     */
    private $idpaiment;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idpaiment = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nomaccessoire
     *
     * @param string $nomaccessoire
     * @return Accessoire
     */
    public function setNomaccessoire($nomaccessoire)
    {
        $this->nomaccessoire = $nomaccessoire;

        return $this;
    }

    /**
     * Get nomaccessoire
     *
     * @return string 
     */
    public function getNomaccessoire()
    {
        return $this->nomaccessoire;
    }

    /**
     * Set debutlocation
     *
     * @param \DateTime $debutlocation
     * @return Accessoire
     */
    public function setDebutlocation($debutlocation)
    {
        $this->debutlocation = $debutlocation;

        return $this;
    }

    /**
     * Get debutlocation
     *
     * @return \DateTime 
     */
    public function getDebutlocation()
    {
        return $this->debutlocation;
    }

    /**
     * Set finlocation
     *
     * @param \DateTime $finlocation
     * @return Accessoire
     */
    public function setFinlocation($finlocation)
    {
        $this->finlocation = $finlocation;

        return $this;
    }

    /**
     * Get finlocation
     *
     * @return \DateTime 
     */
    public function getFinlocation()
    {
        return $this->finlocation;
    }

    /**
     * Set idpersonne
     *
     * @param \dk\SchoolManagerBundle\Entity\Personne $idpersonne
     * @return Accessoire
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

    /**
     * Set idtarif
     *
     * @param \dk\SchoolManagerBundle\Entity\Tarif $idtarif
     * @return Accessoire
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
     * Add idpaiment
     *
     * @param \dk\SchoolManagerBundle\Entity\Paiement $idpaiment
     * @return Accessoire
     */
    public function addIdpaiment(\dk\SchoolManagerBundle\Entity\Paiement $idpaiment)
    {
        $this->idpaiment[] = $idpaiment;

        return $this;
    }

    /**
     * Remove idpaiment
     *
     * @param \dk\SchoolManagerBundle\Entity\Paiement $idpaiment
     */
    public function removeIdpaiment(\dk\SchoolManagerBundle\Entity\Paiement $idpaiment)
    {
        $this->idpaiment->removeElement($idpaiment);
    }

    /**
     * Get idpaiment
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdpaiment()
    {
        return $this->idpaiment;
    }
    
    public function __toString()
    {
        return $this->nomaccessoire;
    }
}