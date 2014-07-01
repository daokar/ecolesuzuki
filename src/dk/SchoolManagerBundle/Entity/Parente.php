<?php

namespace dk\SchoolManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parente
 *
 * @ORM\Table(name="parente", indexes={@ORM\Index(name="FK_AVOIRPARENT", columns={"IDPERSONNE"}), @ORM\Index(name="FK_ETREPARENT", columns={"PER_IDPERSONNE"})})
 * @ORM\Entity(repositoryClass="dk\SchoolManagerBundle\Entity\ParenteRepository")
 */
class Parente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDPARENTE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
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
     * @var \Personne
     *
     * @ORM\ManyToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="PER_IDPERSONNE", referencedColumnName="IDPERSONNE")
     * })
     */
    private $perpersonne;

    /**
     * @var string
     *
     * @ORM\Column(name="TYPEPARENTE", type="string", length=10, nullable=false)
     */
    private $typeparente;

    /**
     * @var boolean
     *
     * @ORM\Column(name="DROITPARENTE", type="boolean", nullable=false)
     */
    private $droitparente;

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
     * Set typeparente
     *
     * @param string $typeparente
     * @return Parente
     */
    public function setTypeparente($typeparente)
    {
        $this->typeparente = $typeparente;

        return $this;
    }

    /**
     * Get typeparente
     *
     * @return string 
     */
    public function getTypeparente()
    {
        return $this->typeparente;
    }

    /**
     * Set droitparente
     *
     * @param boolean $droitparente
     * @return Parente
     */
    public function setDroitparente($droitparente)
    {
        $this->droitparente = $droitparente;

        return $this;
    }

    /**
     * Get droitparente
     *
     * @return boolean 
     */
    public function getDroitparente()
    {
        return $this->droitparente;
    }

    /**
     * Set perpersonne
     *
     * @param \dk\SchoolManagerBundle\Entity\Personne $perpersonne
     * @return Parente
     */
    public function setPerpersonne(\dk\SchoolManagerBundle\Entity\Personne $perpersonne = null)
    {
        $this->perpersonne = $perpersonne;

        return $this;
    }

    /**
     * Get perpersonne
     *
     * @return \dk\SchoolManagerBundle\Entity\Personne 
     */
    public function getPerpersonne()
    {
        return $this->perpersonne;
    }

    /**
     * Set idpersonne
     *
     * @param \dk\SchoolManagerBundle\Entity\Personne $idpersonne
     * @return Parente
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
