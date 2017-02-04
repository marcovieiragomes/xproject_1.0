<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Professor
 *
 * @ORM\Table(name="professor", indexes={@ORM\Index(name="fk_professor_evaluator1_idx", columns={"evaluator_idevaluator"}), @ORM\Index(name="fk_professor_1_idx", columns={"iduser"})})
 * @ORM\Entity
 */
class Professor
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="idprofessor", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprofessor;

    /**
     * @var \AppBundle\Entity\Evaluator
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Evaluator")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="evaluator_idevaluator", referencedColumnName="idevaluator")
     * })
     */
    private $evaluatorevaluator;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iduser", referencedColumnName="iduser")
     * })
     */
    private $iduser;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return Professor
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get idprofessor
     *
     * @return integer
     */
    public function getIdprofessor()
    {
        return $this->idprofessor;
    }

    /**
     * Set evaluatorevaluator
     *
     * @param \AppBundle\Entity\Evaluator $evaluatorevaluator
     *
     * @return Professor
     */
    public function setEvaluatorevaluator(\AppBundle\Entity\Evaluator $evaluatorevaluator = null)
    {
        $this->evaluatorevaluator = $evaluatorevaluator;

        return $this;
    }

    /**
     * Get evaluatorevaluator
     *
     * @return \AppBundle\Entity\Evaluator
     */
    public function getEvaluatorevaluator()
    {
        return $this->evaluatorevaluator;
    }

    /**
     * Set iduser
     *
     * @param \AppBundle\Entity\User $iduser
     *
     * @return Professor
     */
    public function setIduser(\AppBundle\Entity\User $iduser = null)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return \AppBundle\Entity\User
     */
    public function getIduser()
    {
        return $this->iduser;
    }
}
