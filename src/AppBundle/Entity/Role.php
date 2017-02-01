<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Table(name="role", indexes={@ORM\Index(name="fk_role_student1_idx", columns={"student_idsubject"}), @ORM\Index(name="fk_role_professor1_idx", columns={"professor_idprofessor"})})
 * @ORM\Entity
 */
class Role
{
    /**
     * @var string
     *
     * @ORM\Column(name="rolescol", type="string", length=45, nullable=true)
     */
    private $rolescol;

    /**
     * @var integer
     *
     * @ORM\Column(name="idroles", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idroles;

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
     * @var \AppBundle\Entity\Professor
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Professor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="professor_idprofessor", referencedColumnName="idprofessor")
     * })
     */
    private $professorprofessor;



    /**
     * Set rolescol
     *
     * @param string $rolescol
     *
     * @return Role
     */
    public function setRolescol($rolescol)
    {
        $this->rolescol = $rolescol;

        return $this;
    }

    /**
     * Get rolescol
     *
     * @return string
     */
    public function getRolescol()
    {
        return $this->rolescol;
    }

    /**
     * Get idroles
     *
     * @return integer
     */
    public function getIdroles()
    {
        return $this->idroles;
    }

    /**
     * Set studentsubject
     *
     * @param \AppBundle\Entity\Student $studentsubject
     *
     * @return Role
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

    /**
     * Set professorprofessor
     *
     * @param \AppBundle\Entity\Professor $professorprofessor
     *
     * @return Role
     */
    public function setProfessorprofessor(\AppBundle\Entity\Professor $professorprofessor = null)
    {
        $this->professorprofessor = $professorprofessor;

        return $this;
    }

    /**
     * Get professorprofessor
     *
     * @return \AppBundle\Entity\Professor
     */
    public function getProfessorprofessor()
    {
        return $this->professorprofessor;
    }
}
