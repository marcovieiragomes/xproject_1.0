<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 *
 * @ORM\Table(name="student", indexes={@ORM\Index(name="fk_subject_test1_idx", columns={"test_idtest"}), @ORM\Index(name="fk_student_evaluator1_idx", columns={"evaluator_idevaluator"}), @ORM\Index(name="fk_student_class1_idx", columns={"group_idgroup"})})
 * @ORM\Entity
 */
class Student
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer", nullable=true)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=45, nullable=true)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=45, nullable=true)
     */
    private $code;

    /**
     * @var integer
     *
     * @ORM\Column(name="idsubject", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsubject;

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
     * @var \AppBundle\Entity\Evaluator
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Evaluator")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="evaluator_idevaluator", referencedColumnName="idevaluator")
     * })
     */
    private $evaluatorevaluator;

    /**
     * @var \AppBundle\Entity\Group
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Group")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="group_idgroup", referencedColumnName="idgroup")
     * })
     */
    private $groupgroup;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return Student
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
     * Set age
     *
     * @param integer $age
     *
     * @return Student
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Student
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Student
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get idsubject
     *
     * @return integer
     */
    public function getIdsubject()
    {
        return $this->idsubject;
    }

    /**
     * Set testtest
     *
     * @param \AppBundle\Entity\Test $testtest
     *
     * @return Student
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

    /**
     * Set evaluatorevaluator
     *
     * @param \AppBundle\Entity\Evaluator $evaluatorevaluator
     *
     * @return Student
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
     * Set groupgroup
     *
     * @param \AppBundle\Entity\Group $groupgroup
     *
     * @return Student
     */
    public function setGroupgroup(\AppBundle\Entity\Group $groupgroup = null)
    {
        $this->groupgroup = $groupgroup;

        return $this;
    }

    /**
     * Get groupgroup
     *
     * @return \AppBundle\Entity\Group
     */
    public function getGroupgroup()
    {
        return $this->groupgroup;
    }
}
