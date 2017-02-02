<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shouldevaluate
 *
 * @ORM\Table(name="shouldevaluate", indexes={@ORM\Index(name="fk_shouldevaluate_1_idx", columns={"idevaluator"}), @ORM\Index(name="fk_shouldevaluate_2_idx", columns={"idsubject"})})
 * @ORM\Entity
 */
class Shouldevaluate
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idshouldevaluate", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idshouldevaluate;

    /**
     * @var \AppBundle\Entity\Student
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Student")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idsubject", referencedColumnName="idsubject")
     * })
     */
    private $idsubject;

    /**
     * @var \AppBundle\Entity\Evaluator
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Evaluator")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idevaluator", referencedColumnName="idevaluator")
     * })
     */
    private $idevaluator;



    /**
     * Get idshouldevaluate
     *
     * @return integer
     */
    public function getIdshouldevaluate()
    {
        return $this->idshouldevaluate;
    }

    /**
     * Set idsubject
     *
     * @param \AppBundle\Entity\Student $idsubject
     *
     * @return Shouldevaluate
     */
    public function setIdsubject(\AppBundle\Entity\Student $idsubject = null)
    {
        $this->idsubject = $idsubject;

        return $this;
    }

    /**
     * Get idsubject
     *
     * @return \AppBundle\Entity\Student
     */
    public function getIdsubject()
    {
        return $this->idsubject;
    }

    /**
     * Set idevaluator
     *
     * @param \AppBundle\Entity\Evaluator $idevaluator
     *
     * @return Shouldevaluate
     */
    public function setIdevaluator(\AppBundle\Entity\Evaluator $idevaluator = null)
    {
        $this->idevaluator = $idevaluator;

        return $this;
    }

    /**
     * Get idevaluator
     *
     * @return \AppBundle\Entity\Evaluator
     */
    public function getIdevaluator()
    {
        return $this->idevaluator;
    }
}
