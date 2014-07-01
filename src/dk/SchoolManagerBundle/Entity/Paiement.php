<?php

namespace dk\SchoolManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paiement
 *
 * @ORM\Table(name="paiement")
 * @ORM\Entity(repositoryClass="dk\SchoolManagerBundle\Entity\PaiementRepository")
 */
class Paiement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDPAIEMENT", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATEPAIEMENT", type="date", nullable=false)
     */
    private $datepaiement;

    /**
     * @var float
     *
     * @ORM\Column(name="MONTANTPAIEMENT", type="float", precision=6, scale=2, nullable=false)
     */
    private $montantpaiement;

    /**
     * @var string
     *
     * @ORM\Column(name="MODEPAIEMENT", type="string", length=20, nullable=false)
     */
    private $modepaiement;

    /**
     * @var string
     *
     * @ORM\Column(name="REFPAIEMENT", type="string", length=20, nullable=false)
     */
    private $refpaiement;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Accessoire", mappedBy="idpaiement")
     */
    private $idaccessoire;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Inscription", mappedBy="idpaiement")
     */
    private $idinscription;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idaccessoire = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set datepaiement
     *
     * @param \DateTime $datepaiement
     * @return Paiement
     */
    public function setDatepaiement($datepaiement)
    {
        $this->datepaiement = $datepaiement;

        return $this;
    }

    /**
     * Get datepaiement
     *
     * @return \DateTime 
     */
    public function getDatepaiement()
    {
        return $this->datepaiement;
    }

    /**
     * Set montantpaiement
     *
     * @param float $montantpaiement
     * @return Paiement
     */
    public function setMontantpaiement($montantpaiement)
    {
        $this->montantpaiement = $montantpaiement;

        return $this;
    }

    /**
     * Get montantpaiement
     *
     * @return float 
     */
    public function getMontantpaiement()
    {
        return $this->montantpaiement;
    }

    /**
     * Set modepaiement
     *
     * @param string $modepaiement
     * @return Paiement
     */
    public function setModepaiement($modepaiement)
    {
        $this->modepaiement = $modepaiement;

        return $this;
    }

    /**
     * Get modepaiement
     *
     * @return string 
     */
    public function getModepaiement()
    {
        return $this->modepaiement;
    }

    /**
     * Set refpaiement
     *
     * @param string $refpaiement
     * @return Paiement
     */
    public function setRefpaiement($refpaiement)
    {
        $this->refpaiement = $refpaiement;

        return $this;
    }

    /**
     * Get refpaiement
     *
     * @return string 
     */
    public function getRefpaiement()
    {
        return $this->refpaiement;
    }

    /**
     * Add idaccessoire
     *
     * @param \dk\SchoolManagerBundle\Entity\Accessoire $idaccessoire
     * @return Paiement
     */
    public function addIdaccessoire(\dk\SchoolManagerBundle\Entity\Accessoire $idaccessoire)
    {
        $this->idaccessoire[] = $idaccessoire;

        return $this;
    }

    /**
     * Remove idaccessoire
     *
     * @param \dk\SchoolManagerBundle\Entity\Accessoire $idaccessoire
     */
    public function removeIdaccessoire(\dk\SchoolManagerBundle\Entity\Accessoire $idaccessoire)
    {
        $this->idaccessoire->removeElement($idaccessoire);
    }

    /**
     * Get idaccessoire
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdaccessoire()
    {
        return $this->idaccessoire;
    }

    /**
     * Add idinscription
     *
     * @param \dk\SchoolManagerBundle\Entity\Inscription $idinscription
     * @return Paiement
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
        return $this->refpaiement;
    }
}
