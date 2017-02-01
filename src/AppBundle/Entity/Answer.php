<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Answer
 *
 * @ORM\Table(name="answer", indexes={@ORM\Index(name="fk_answer_test_has_question1_idx", columns={"test_has_question_test_idtest", "test_has_question_question_idquestion"})})
 * @ORM\Entity
 */
class Answer
{
    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=16777215, nullable=true)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="ambient-variables", type="string", length=45, nullable=true)
     */
    private $ambientVariables;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime", nullable=true)
     */
    private $time;

    /**
     * @var integer
     *
     * @ORM\Column(name="idanswer", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idanswer;

    /**
     * @var \AppBundle\Entity\TestHasQuestion
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TestHasQuestion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="test_has_question_test_idtest", referencedColumnName="test_idtest"),
     *   @ORM\JoinColumn(name="test_has_question_question_idquestion", referencedColumnName="question_idquestion")
     * })
     */
    private $testHasQuestionTesttest;



    /**
     * Set text
     *
     * @param string $text
     *
     * @return Answer
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set ambientVariables
     *
     * @param string $ambientVariables
     *
     * @return Answer
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
     * @return Answer
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
     * Get idanswer
     *
     * @return integer
     */
    public function getIdanswer()
    {
        return $this->idanswer;
    }

    /**
     * Set testHasQuestionTesttest
     *
     * @param \AppBundle\Entity\TestHasQuestion $testHasQuestionTesttest
     *
     * @return Answer
     */
    public function setTestHasQuestionTesttest(\AppBundle\Entity\TestHasQuestion $testHasQuestionTesttest = null)
    {
        $this->testHasQuestionTesttest = $testHasQuestionTesttest;

        return $this;
    }

    /**
     * Get testHasQuestionTesttest
     *
     * @return \AppBundle\Entity\TestHasQuestion
     */
    public function getTestHasQuestionTesttest()
    {
        return $this->testHasQuestionTesttest;
    }
}
