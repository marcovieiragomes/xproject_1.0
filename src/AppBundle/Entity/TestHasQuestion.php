<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TestHasQuestion
 *
 * @ORM\Table(name="test_has_question", indexes={@ORM\Index(name="fk_test_has_question_question1_idx", columns={"question_idquestion"}), @ORM\Index(name="fk_test_has_question_test_idx", columns={"test_idtest"})})
 * @ORM\Entity
 */
class TestHasQuestion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="score", type="integer", nullable=true)
     */
    private $score;

    /**
     * @var integer
     *
     * @ORM\Column(name="usesStressors", type="integer", nullable=true)
     */
    private $usesstressors;

    /**
     * @var integer
     *
     * @ORM\Column(name="idtest_has_question", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtestHasQuestion;

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
     * @var \AppBundle\Entity\Test
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Test")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="test_idtest", referencedColumnName="idtest")
     * })
     */
    private $testtest;



    /**
     * Set score
     *
     * @param integer $score
     *
     * @return TestHasQuestion
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return integer
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set usesstressors
     *
     * @param integer $usesstressors
     *
     * @return TestHasQuestion
     */
    public function setUsesstressors($usesstressors)
    {
        $this->usesstressors = $usesstressors;

        return $this;
    }

    /**
     * Get usesstressors
     *
     * @return integer
     */
    public function getUsesstressors()
    {
        return $this->usesstressors;
    }

    /**
     * Get idtestHasQuestion
     *
     * @return integer
     */
    public function getIdtestHasQuestion()
    {
        return $this->idtestHasQuestion;
    }

    /**
     * Set questionquestion
     *
     * @param \AppBundle\Entity\Question $questionquestion
     *
     * @return TestHasQuestion
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

    /**
     * Set testtest
     *
     * @param \AppBundle\Entity\Test $testtest
     *
     * @return TestHasQuestion
     */
    public function setTesttest(\AppBundle\Entity\Test $testtest = null)
    {
        $this->testtest = $testtest;

        return $this;
    }

    /**
     * Get testtest
     *
     * @return \AppBundle\Entity\Test
     */
    public function getTesttest()
    {
        return $this->testtest;
    }
}
