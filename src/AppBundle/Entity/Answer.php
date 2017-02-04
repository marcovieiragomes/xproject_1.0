<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Answer
 *
 * @ORM\Table(name="answer", indexes={@ORM\Index(name="fk_answer_test_has_question1_idx", columns={"test_has_questiont_idtest_has_question"}), @ORM\Index(name="fk_answer_2_idx", columns={"idstudent"})})
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
     * @ORM\Column(name="ambient_variables", type="text", nullable=true)
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
     * @var \AppBundle\Entity\Student
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Student")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idstudent", referencedColumnName="idsubject")
     * })
     */
    private $idstudent;

    /**
     * @var \AppBundle\Entity\TestHasQuestion
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TestHasQuestion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="test_has_questiont_idtest_has_question", referencedColumnName="idtest_has_question")
     * })
     */
    private $testHasQuestionttestHasQuestion;



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
     * Set idstudent
     *
     * @param \AppBundle\Entity\Student $idstudent
     *
     * @return Answer
     */
    public function setIdstudent(\AppBundle\Entity\Student $idstudent = null)
    {
        $this->idstudent = $idstudent;

        return $this;
    }

    /**
     * Get idstudent
     *
     * @return \AppBundle\Entity\Student
     */
    public function getIdstudent()
    {
        return $this->idstudent;
    }

    /**
     * Set testHasQuestionttestHasQuestion
     *
     * @param \AppBundle\Entity\TestHasQuestion $testHasQuestionttestHasQuestion
     *
     * @return Answer
     */
    public function setTestHasQuestionttestHasQuestion(\AppBundle\Entity\TestHasQuestion $testHasQuestionttestHasQuestion = null)
    {
        $this->testHasQuestionttestHasQuestion = $testHasQuestionttestHasQuestion;

        return $this;
    }

    /**
     * Get testHasQuestionttestHasQuestion
     *
     * @return \AppBundle\Entity\TestHasQuestion
     */
    public function getTestHasQuestionttestHasQuestion()
    {
        return $this->testHasQuestionttestHasQuestion;
    }
}
