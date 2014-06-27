<?php

namespace dk\SchoolManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tarif
 *
 * @ORM\Table(name="tarif")
 * @ORM\Entity
 */
class Tarif
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDTARIF", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="TYPETARIF", type="string", length=55, nullable=false)
     */
    private $typetarif;

    /**
     * @var float
     *
     * @ORM\Column(name="MONTANTTARIF", type="float", precision=5, scale=2, nullable=false)
     */
    private $montanttarif;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATETARIF", type="date", nullable=true)
     */
    private $datetarif;



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
     * Set typetarif
     *
     * @param string $typetarif
     * @return Tarif
     */
    public function setTypetarif($typetarif)
    {
        $this->typetarif = $typetarif;

        return $this;
    }

    /**
     * Get typetarif
     *
     * @return string 
     */
    public function getTypetarif()
    {
        return $this->typetarif;
    }

    /**
     * Set montanttarif
     *
     * @param float $montanttarif
     * @return Tarif
     */
    public function setMontanttarif($montanttarif)
    {
        $this->montanttarif = $montanttarif;

        return $this;
    }

    /**
     * Get montanttarif
     *
     * @return float 
     */
    public function getMontanttarif()
    {
        return $this->montanttarif;
    }

    /**
     * Set datetarif
     *
     * @param \DateTime $datetarif
     * @return Tarif
     */
    public function setDatetarif($datetarif)
    {
        $this->datetarif = $datetarif;

        return $this;
    }

    /**
     * Get datetarif
     *
     * @return \DateTime 
     */
    public function getDatetarif()
    {
        return $this->datetarif;
    }
    
    public function __toString()
    {
        return $this->typetarif;
    }
}
