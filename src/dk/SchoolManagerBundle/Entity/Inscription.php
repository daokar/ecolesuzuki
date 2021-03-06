<?php

namespace dk\SchoolManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscription
 *
 * @ORM\Table(name="inscription", indexes={@ORM\Index(name="FK_FAIRE", columns={"IDPERSONNE"})})
 * @ORM\Entity(repositoryClass="dk\SchoolManagerBundle\Entity\InscriptionRepository")
 */
class Inscription
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDINSCRIPTION", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATEINSCRIPTION", type="date", nullable=false)
     */
    private $dateinscription;

    /**
     * @var string
     *
     * @ORM\Column(name="MODALITEPAIEMENT", type="string", length=30, nullable=true)
     */
    private $modalitepaiement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATEABANDON", type="date", nullable=true)
     */
    private $dateabandon;

    /**
     * @var string
     *
     * @ORM\Column(name="MOTIFABANDON", type="text", nullable=true)
     */
    private $motifabandon;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Cours", inversedBy="idinscription", cascade={"persist", "merge"})
     * @ORM\JoinTable(name="inscriptioncours",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IDINSCRIPTION", referencedColumnName="IDINSCRIPTION")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IDCOURS", referencedColumnName="IDCOURS")
     *   }
     * )
     */
    private $idcours;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Paiement", inversedBy="idinscription", cascade={"persist", "merge"})
     * @ORM\JoinTable(name="paiementinscription",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IDINSCRIPTION", referencedColumnName="IDINSCRIPTION")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IDPAIEMENT", referencedColumnName="IDPAIEMENT")
     *   }
     * )
     */
    private $idpaiement;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idcours = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idpaiement = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set dateinscription
     *
     * @param \DateTime $dateinscription
     * @return Inscription
     */
    public function setDateinscription($dateinscription)
    {
        $this->dateinscription = $dateinscription;

        return $this;
    }

    /**
     * Get dateinscription
     *
     * @return \DateTime 
     */
    public function getDateinscription()
    {
        return $this->dateinscription;
    }

    /**
     * Set modalitepaiement
     *
     * @param string $modalitepaiement
     * @return Inscription
     */
    public function setModalitepaiement($modalitepaiement)
    {
        $this->modalitepaiement = $modalitepaiement;

        return $this;
    }

    /**
     * Get modalitepaiement
     *
     * @return string 
     */
    public function getModalitepaiement()
    {
        return $this->modalitepaiement;
    }

    /**
     * Set dateabandon
     *
     * @param \DateTime $dateabandon
     * @return Inscription
     */
    public function setDateabandon($dateabandon)
    {
        $this->dateabandon = $dateabandon;

        return $this;
    }

    /**
     * Get dateabandon
     *
     * @return \DateTime 
     */
    public function getDateabandon()
    {
        return $this->dateabandon;
    }

    /**
     * Set motifabandon
     *
     * @param string $motifabandon
     * @return Inscription
     */
    public function setMotifabandon($motifabandon)
    {
        $this->motifabandon = $motifabandon;

        return $this;
    }

    /**
     * Get motifabandon
     *
     * @return string 
     */
    public function getMotifabandon()
    {
        return $this->motifabandon;
    }

    /**
     * Set idpersonne
     *
     * @param \dk\SchoolManagerBundle\Entity\Personne $idpersonne
     * @return Inscription
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
     * Add idcours
     *
     * @param \dk\SchoolManagerBundle\Entity\Cours $idcours
     * @return Inscription
     */
    public function addIdcour(\dk\SchoolManagerBundle\Entity\Cours $idcours)
    {
        $this->idcours[] = $idcours;

        return $this;
    }

    /**
     * Remove idcours
     *
     * @param \dk\SchoolManagerBundle\Entity\Cours $idcours
     */
    public function removeIdcour(\dk\SchoolManagerBundle\Entity\Cours $idcours)
    {
        $this->idcours->removeElement($idcours);
    }

    /**
     * Get idcours
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdcours()
    {
        return $this->idcours;
    }

    /**
     * Add idpaiement
     *
     * @param \dk\SchoolManagerBundle\Entity\Paiement $idpaiement
     * @return Inscription
     */
    public function addIdpaiement(\dk\SchoolManagerBundle\Entity\Paiement $idpaiement)
    {
        $this->idpaiement[] = $idpaiement;

        return $this;
    }

    /**
     * Remove idpaiement
     *
     * @param \dk\SchoolManagerBundle\Entity\Paiement $idpaiement
     */
    public function removeIdpaiement(\dk\SchoolManagerBundle\Entity\Paiement $idpaiement)
    {
        $this->idpaiement->removeElement($idpaiement);
    }

    /**
     * Get idpaiement
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdpaiement()
    {
        return $this->idpaiement;
    }

}
