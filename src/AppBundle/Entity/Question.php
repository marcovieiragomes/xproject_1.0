<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity
 */
class Question
{
    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=16777215, nullable=true)
     */
    private $text;

    /**
     * @var integer
     *
     * @ORM\Column(name="evaluation", type="integer", nullable=true)
     */
    private $evaluation;

    /**
     * @var integer
     *
     * @ORM\Column(name="idquestion", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idquestion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Test", mappedBy="questionquestion")
     */
    private $testtest;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->testtest = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set text
     *
     * @param string $text
     *
     * @return Question
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
     * Set evaluation
     *
     * @param integer $evaluation
     *
     * @return Question
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
     * Get idquestion
     *
     * @return integer
     */
    public function getIdquestion()
    {
        return $this->idquestion;
    }

    /**
     * Add testtest
     *
     * @param \AppBundle\Entity\Test $testtest
     *
     * @return Question
     */
    public function addTesttest(\AppBundle\Entity\Test $testtest)
    {
        $this->testtest[] = $testtest;

        return $this;
    }

    /**
     * Remove testtest
     *
     * @param \AppBundle\Entity\Test $testtest
     */
    public function removeTesttest(\AppBundle\Entity\Test $testtest)
    {
        $this->testtest->removeElement($testtest);
    }

    /**
     * Get testtest
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTesttest()
    {
        return $this->testtest;
    }
}
