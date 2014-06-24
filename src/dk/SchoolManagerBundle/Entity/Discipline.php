<?php

namespace dk\SchoolManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Discipline
 *
 * @ORM\Table(name="discipline")
 * @ORM\Entity(repositoryClass="dk\SchoolManagerBundle\Repository\DisciplineRepository")
 */
class Discipline
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDDISCIPLINE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMDISCIPLINE", type="string", length=30, nullable=false)
     */
    private $nomdiscipline;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Cours", inversedBy="iddiscipline", cascade={"persist", "merge"})
     * @ORM\JoinTable(name="disciplinecours",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IDDISCIPLINE", referencedColumnName="IDDISCIPLINE")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IDCOURS", referencedColumnName="IDCOURS")
     *   }
     * )
     */
    private $idcours;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idcours = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nomdiscipline
     *
     * @param string $nomdiscipline
     * @return Discipline
     */
    public function setNomdiscipline($nomdiscipline)
    {
        $this->nomdiscipline = $nomdiscipline;

        return $this;
    }

    /**
     * Get nomdiscipline
     *
     * @return string 
     */
    public function getNomdiscipline()
    {
        return $this->nomdiscipline;
    }

    /**
     * Add idcours
     *
     * @param \dk\SchoolManagerBundle\Entity\Cours $idcours
     * @return Discipline
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
    
    public function __toString()
    {
        return $this->nomdiscipline;
    }
}
