<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluation
 *
 * @ORM\Table(name="evaluation", indexes={@ORM\Index(name="fk_evaluation_evaluator1_idx", columns={"evaluator_idevaluator"}), @ORM\Index(name="fk_evaluation_answer1_idx", columns={"answer_idanswer"})})
 * @ORM\Entity
 */
class Evaluation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="evaluation", type="integer", nullable=true)
     */
    private $evaluation;

    /**
     * @var string
     *
     * @ORM\Column(name="criterion_accomplished", type="string", length=45, nullable=true)
     */
    private $criterionAccomplished;

    /**
     * @var string
     *
     * @ORM\Column(name="ambient_variables", type="text", nullable=false)
     */
    private $ambientVariables;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime", nullable=false)
     */
    private $time;

    /**
     * @var integer
     *
     * @ORM\Column(name="idevaluation", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idevaluation;

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
     * @var \AppBundle\Entity\Answer
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Answer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="answer_idanswer", referencedColumnName="idanswer")
     * })
     */
    private $answeranswer;



    /**
     * Set evaluation
     *
     * @param integer $evaluation
     *
     * @return Evaluation
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
     * Set criterionAccomplished
     *
     * @param string $criterionAccomplished
     *
     * @return Evaluation
     */
    public function setCriterionAccomplished($criterionAccomplished)
    {
        $this->criterionAccomplished = $criterionAccomplished;

        return $this;
    }

    /**
     * Get criterionAccomplished
     *
     * @return string
     */
    public function getCriterionAccomplished()
    {
        return $this->criterionAccomplished;
    }

    /**
     * Set ambientVariables
     *
     * @param string $ambientVariables
     *
     * @return Evaluation
     */
    public function setAmbientVariables($ambientVariables)
    {
        $this->ambientVariables = $ambientVariables;

        return $this;
    }

    /**
     * Get ambientVariables
     *
     * @return string
     */
    public function getAmbientVariables()
    {
        return $this->ambientVariables;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     *
     * @return Evaluation
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Get idevaluation
     *
     * @return integer
     */
    public function getIdevaluation()
    {
        return $this->idevaluation;
    }

    /**
     * Set evaluatorevaluator
     *
     * @param \AppBundle\Entity\Evaluator $evaluatorevaluator
     *
     * @return Evaluation
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
     * Set answeranswer
     *
     * @param \AppBundle\Entity\Answer $answeranswer
     *
     * @return Evaluation
     */
    public function setAnsweranswer(\AppBundle\Entity\Answer $answeranswer = null)
    {
        $this->answeranswer = $answeranswer;

        return $this;
    }

    /**
     * Get answeranswer
     *
     * @return \AppBundle\Entity\Answer
     */
    public function getAnsweranswer()
    {
        return $this->answeranswer;
    }
}
