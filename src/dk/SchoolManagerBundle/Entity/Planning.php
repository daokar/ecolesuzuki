<?php

namespace dk\SchoolManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Planning
 *
 * @ORM\Table(name="planning", indexes={@ORM\Index(name="FK_AVOIR_LIEU", columns={"IDSALLE"}), @ORM\Index(name="FK_PLANIFIER", columns={"IDCOURS"})})
 * @ORM\Entity(repositoryClass="dk\SchoolManagerBundle\Repository\PlanningRepository")
 */
class Planning
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDPLANNING", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATEPLANNING", type="datetime", nullable=false)
     */
    private $dateplanning;

    /**
     * @var \Cours
     *
     * @ORM\ManyToOne(targetEntity="Cours")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDCOURS", referencedColumnName="IDCOURS")
     * })
     */
    private $idcours;

    /**
     * @var \Salle
     *
     * @ORM\ManyToOne(targetEntity="Salle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDSALLE", referencedColumnName="IDSALLE")
     * })
     */
    private $idsalle;



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
     * Set dateplanning
     *
     * @param \DateTime $dateplanning
     * @return Planning
     */
    public function setDateplanning($dateplanning)
    {
        $this->dateplanning = $dateplanning;

        return $this;
    }

    /**
     * Get dateplanning
     *
     * @return \DateTime 
     */
    public function getDateplanning()
    {
        return $this->dateplanning;
    }

    /**
     * Set idcours
     *
     * @param \dk\SchoolManagerBundle\Entity\Cours $idcours
     * @return Planning
     */
    public function setIdcours(\dk\SchoolManagerBundle\Entity\Cours $idcours = null)
    {
        $this->idcours = $idcours;

        return $this;
    }

    /**
     * Get idcours
     *
     * @return \dk\SchoolManagerBundle\Entity\Cours 
     */
    public function getIdcours()
    {
        return $this->idcours;
    }

    /**
     * Set idsalle
     *
     * @param \dk\SchoolManagerBundle\Entity\Salle $idsalle
     * @return Planning
     */
    public function setIdsalle(\dk\SchoolManagerBundle\Entity\Salle $idsalle = null)
    {
        $this->idsalle = $idsalle;

        return $this;
    }

    /**
     * Get idsalle
     *
     * @return \dk\SchoolManagerBundle\Entity\Salle 
     */
    public function getIdsalle()
    {
        return $this->idsalle;
    }
    
    
}
