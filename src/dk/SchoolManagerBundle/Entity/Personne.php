<?php

namespace dk\SchoolManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personne
 *
 * @ORM\Table(name="personne", indexes={@ORM\Index(name="FK_RESIDER", columns={"IDADRESSE"})})
 * @ORM\Entity
 */
class Personne
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDPERSONNE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMPERSONNE", type="string", length=55, nullable=false)
     */
    private $nompersonne;

    /**
     * @var string
     *
     * @ORM\Column(name="PRENOMPERSONNE", type="string", length=55, nullable=true)
     */
    private $prenompersonne;

    /**
     * @var string
     *
     * @ORM\Column(name="TYPEPERSONNE", type="string", length=20, nullable=true)
     */
    private $typepersonne;

    /**
     * @var string
     *
     * @ORM\Column(name="SEXEPERSONNE", type="string", length=1, nullable=true)
     */
    private $sexepersonne;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATENAISSANCE", type="date", nullable=true)
     */
    private $datenaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="MAILPERSONNE", type="string", length=55, nullable=true)
     */
    private $mailpersonne;

    /**
     * @var string
     *
     * @ORM\Column(name="TELPORTABLE", type="string", length=10, nullable=true)
     */
    private $telportable;

    /**
     * @var string
     *
     * @ORM\Column(name="COMMENTAIREPERSONNE", type="text", nullable=true)
     */
    private $commentairepersonne;

    /**
     * @var \Adresse
     *
     * @ORM\ManyToOne(targetEntity="Adresse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDADRESSE", referencedColumnName="IDADRESSE")
     * })
     */
    private $idadresse;



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
     * Set nompersonne
     *
     * @param string $nompersonne
     * @return Personne
     */
    public function setNompersonne($nompersonne)
    {
        $this->nompersonne = $nompersonne;

        return $this;
    }

    /**
     * Get nompersonne
     *
     * @return string 
     */
    public function getNompersonne()
    {
        return $this->nompersonne;
    }

    /**
     * Set prenompersonne
     *
     * @param string $prenompersonne
     * @return Personne
     */
    public function setPrenompersonne($prenompersonne)
    {
        $this->prenompersonne = $prenompersonne;

        return $this;
    }

    /**
     * Get prenompersonne
     *
     * @return string 
     */
    public function getPrenompersonne()
    {
        return $this->prenompersonne;
    }

    /**
     * Set typepersonne
     *
     * @param string $typepersonne
     * @return Personne
     */
    public function setTypepersonne($typepersonne)
    {
        $this->typepersonne = $typepersonne;

        return $this;
    }

    /**
     * Get typepersonne
     *
     * @return string 
     */
    public function getTypepersonne()
    {
        return $this->typepersonne;
    }

    /**
     * Set sexepersonne
     *
     * @param string $sexepersonne
     * @return Personne
     */
    public function setSexepersonne($sexepersonne)
    {
        $this->sexepersonne = $sexepersonne;

        return $this;
    }

    /**
     * Get sexepersonne
     *
     * @return string 
     */
    public function getSexepersonne()
    {
        return $this->sexepersonne;
    }

    /**
     * Set datenaissance
     *
     * @param \DateTime $datenaissance
     * @return Personne
     */
    public function setDatenaissance($datenaissance)
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    /**
     * Get datenaissance
     *
     * @return \DateTime 
     */
    public function getDatenaissance()
    {
        return $this->datenaissance;
    }

    /**
     * Set mailpersonne
     *
     * @param string $mailpersonne
     * @return Personne
     */
    public function setMailpersonne($mailpersonne)
    {
        $this->mailpersonne = $mailpersonne;

        return $this;
    }

    /**
     * Get mailpersonne
     *
     * @return string 
     */
    public function getMailpersonne()
    {
        return $this->mailpersonne;
    }

    /**
     * Set telportable
     *
     * @param string $telportable
     * @return Personne
     */
    public function setTelportable($telportable)
    {
        $this->telportable = $telportable;

        return $this;
    }

    /**
     * Get telportable
     *
     * @return string 
     */
    public function getTelportable()
    {
        return $this->telportable;
    }

    /**
     * Set commentairepersonne
     *
     * @param string $commentairepersonne
     * @return Personne
     */
    public function setCommentairepersonne($commentairepersonne)
    {
        $this->commentairepersonne = $commentairepersonne;

        return $this;
    }

    /**
     * Get commentairepersonne
     *
     * @return string 
     */
    public function getCommentairepersonne()
    {
        return $this->commentairepersonne;
    }

    /**
     * Set idadresse
     *
     * @param \dk\SchoolManagerBundle\Entity\Adresse $idadresse
     * @return Personne
     */
    public function setId(\dk\SchoolManagerBundle\Entity\Adresse $idadresse = null)
    {
        $this->idadresse = $idadresse;

        return $this;
    }

    /**
     * Get idadresse
     *
     * @return \dk\SchoolManagerBundle\Entity\Adresse 
     */
    public function getIdadresse()
    {
        return $this->idadresse;
    }
    
    public function __toString()
    {
        return $this->nompersonne.' '.$this->prenompersonne;
    }

    /**
     * Set idadresse
     *
     * @param \dk\SchoolManagerBundle\Entity\Adresse $idadresse
     * @return Personne
     */
    public function setIdadresse(\dk\SchoolManagerBundle\Entity\Adresse $idadresse = null)
    {
        $this->idadresse = $idadresse;

        return $this;
    }
}
