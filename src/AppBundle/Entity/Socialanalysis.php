<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Socialanalysis
 *
 * @ORM\Table(name="socialanalysis", indexes={@ORM\Index(name="fk_socialanalysis_student1_idx", columns={"student_idsubject"}), @ORM\Index(name="fk_socialanalysis_student2_idx", columns={"student_idsubject1"})})
 * @ORM\Entity
 */
class Socialanalysis
{
    /**
     * @var integer
     *
     * @ORM\Column(name="hidrance", type="integer", nullable=true)
     */
    private $hidrance;

    /**
     * @var integer
     *
     * @ORM\Column(name="friendship1", type="integer", nullable=true)
     */
    private $friendship1;

    /**
     * @var integer
     *
     * @ORM\Column(name="friendship2", type="integer", nullable=true)
     */
    private $friendship2;

    /**
     * @var integer
     *
     * @ORM\Column(name="advice", type="integer", nullable=true)
     */
    private $advice;

    /**
     * @var integer
     *
     * @ORM\Column(name="confidence", type="integer", nullable=true)
     */
    private $confidence;

    /**
     * @var integer
     *
     * @ORM\Column(name="experiment_idexperiment", type="integer", nullable=true)
     */
    private $experimentIdexperiment;

    /**
     * @var integer
     *
     * @ORM\Column(name="idsocialanalysis", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsocialanalysis;

    /**
     * @var \AppBundle\Entity\Student
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Student")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="student_idsubject1", referencedColumnName="idsubject")
     * })
     */
    private $studentsubject1;

    /**
     * @var \AppBundle\Entity\Student
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Student")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="student_idsubject", referencedColumnName="idsubject")
     * })
     */
    private $studentsubject;



    /**
     * Set hidrance
     *
     * @param integer $hidrance
     *
     * @return Socialanalysis
     */
    public function setHidrance($hidrance)
    {
        $this->hidrance = $hidrance;

        return $this;
    }

    /**
     * Get hidrance
     *
     * @return integer
     */
    public function getHidrance()
    {
        return $this->hidrance;
    }

    /**
     * Set friendship1
     *
     * @param integer $friendship1
     *
     * @return Socialanalysis
     */
    public function setFriendship1($friendship1)
    {
        $this->friendship1 = $friendship1;

        return $this;
    }

    /**
     * Get friendship1
     *
     * @return integer
     */
    public function getFriendship1()
    {
        return $this->friendship1;
    }

    /**
     * Set friendship2
     *
     * @param integer $friendship2
     *
     * @return Socialanalysis
     */
    public function setFriendship2($friendship2)
    {
        $this->friendship2 = $friendship2;

        return $this;
    }

    /**
     * Get friendship2
     *
     * @return integer
     */
    public function getFriendship2()
    {
        return $this->friendship2;
    }

    /**
     * Set advice
     *
     * @param integer $advice
     *
     * @return Socialanalysis
     */
    public function setAdvice($advice)
    {
        $this->advice = $advice;

        return $this;
    }

    /**
     * Get advice
     *
     * @return integer
     */
    public function getAdvice()
    {
        return $this->advice;
    }

    /**
     * Set confidence
     *
     * @param integer $confidence
     *
     * @return Socialanalysis
     */
    public function setConfidence($confidence)
    {
        $this->confidence = $confidence;

        return $this;
    }

    /**
     * Get confidence
     *
     * @return integer
     */
    public function getConfidence()
    {
        return $this->confidence;
    }

    /**
     * Set experimentIdexperiment
     *
     * @param integer $experimentIdexperiment
     *
     * @return Socialanalysis
     */
    public function setExperimentIdexperiment($experimentIdexperiment)
    {
        $this->experimentIdexperiment = $experimentIdexperiment;

        return $this;
    }

    /**
     * Get experimentIdexperiment
     *
     * @return integer
     */
    public function getExperimentIdexperiment()
    {
        return $this->experimentIdexperiment;
    }

    /**
     * Get idsocialanalysis
     *
     * @return integer
     */
    public function getIdsocialanalysis()
    {
        return $this->idsocialanalysis;
    }

    /**
     * Set studentsubject1
     *
     * @param \AppBundle\Entity\Student $studentsubject1
     *
     * @return Socialanalysis
     */
    public function setStudentsubject1(\AppBundle\Entity\Student $studentsubject1 = null)
    {
        $this->studentsubject1 = $studentsubject1;

        return $this;
    }

    /**
     * Get studentsubject1
     *
     * @return \AppBundle\Entity\Student
     */
    public function getStudentsubject1()
    {
        return $this->studentsubject1;
    }

    /**
     * Set studentsubject
     *
     * @param \AppBundle\Entity\Student $studentsubject
     *
     * @return Socialanalysis
     */
    public function setStudentsubject(\AppBundle\Entity\Student $studentsubject = null)
    {
        $this->studentsubject = $studentsubject;

        return $this;
    }

    /**
     * Get studentsubject
     *
     * @return \AppBundle\Entity\Student
     */
    public function getStudentsubject()
    {
        return $this->studentsubject;
    }
}
