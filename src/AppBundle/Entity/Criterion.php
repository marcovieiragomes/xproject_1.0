<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Criterion
 *
 * @ORM\Table(name="criterion", indexes={@ORM\Index(name="fk_criterion_question1_idx", columns={"question_idquestion"})})
 * @ORM\Entity
 */
class Criterion
{
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=100, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="evaluation", type="integer", nullable=true)
     */
    private $evaluation;

    /**
     * @var integer
     *
     * @ORM\Column(name="issubjective", type="integer", nullable=true)
     */
    private $issubjective;

    /**
     * @var integer
     *
     * @ORM\Column(name="idcriterion", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcriterion;

    /**
     * @var \AppBundle\Entity\Question
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Question")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="question_idquestion", referencedColumnName="idquestion")
     * })
     */
    private $questionquestion;



    /**
     * Set description
     *
     * @param string $description
     *
     * @return Criterion
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set evaluation
     *
     * @param integer $evaluation
     *
     * @return Criterion
     */
    public function setEvaluation($evaluation)
    {
        $this->evaluation = $evaluation;

        return $this;
    }

    /**
     * Get evaluation
     *
     * @return integer
     */
    public function getEvaluation()
    {
        return $this->evaluation;
    }

    /**
     * Set issubjective
     *
     * @param integer $issubjective
     *
     * @return Criterion
     */
    public function setIssubjective($issubjective)
    {
        $this->issubjective = $issubjective;

        return $this;
    }

    /**
     * Get issubjective
     *
     * @return integer
     */
    public function getIssubjective()
    {
        return $this->issubjective;
    }

    /**
     * Get idcriterion
     *
     * @return integer
     */
    public function getIdcriterion()
    {
        return $this->idcriterion;
    }

    /**
     * Set questionquestion
     *
     * @param \AppBundle\Entity\Question $questionquestion
     *
     * @return Criterion
     */
    public function setQuestionquestion(\AppBundle\Entity\Question $questionquestion = null)
    {
        $this->questionquestion = $questionquestion;

        return $this;
    }

    /**
     * Get questionquestion
     *
     * @return \AppBundle\Entity\Question
     */
    public function getQuestionquestion()
    {
        return $this->questionquestion;
    }
}
