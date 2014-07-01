<?php

namespace dk\SchoolManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salle
 *
 * @ORM\Table(name="salle")
 * @ORM\Entity(repositoryClass="dk\SchoolManagerBundle\Entity\SalleRepository")
 */
class Salle
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDSALLE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMSALLE", type="string", length=30, nullable=false)
     */
    private $nomsalle;

    /**
     * @var string
     *
     * @ORM\Column(name="CAPACITESALLE", type="decimal", precision=3, scale=0, nullable=true)
     */
    private $capacitesalle;



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
     * Set nomsalle
     *
     * @param string $nomsalle
     * @return Salle
     */
    public function setNomsalle($nomsalle)
    {
        $this->nomsalle = $nomsalle;

        return $this;
    }

    /**
     * Get nomsalle
     *
     * @return string 
     */
    public function getNomsalle()
    {
        return $this->nomsalle;
    }

    /**
     * Set capacitesalle
     *
     * @param string $capacitesalle
     * @return Salle
     */
    public function setCapacitesalle($capacitesalle)
    {
        $this->capacitesalle = $capacitesalle;

        return $this;
    }

    /**
     * Get capacitesalle
     *
     * @return string 
     */
    public function getCapacitesalle()
    {
        return $this->capacitesalle;
    }
    
    public function __toString()
    {
        return $this->nomsalle;
    }
}
