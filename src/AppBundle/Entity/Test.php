<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="test", indexes={@ORM\Index(name="fk_test_professor1_idx", columns={"professor_idprofessor"}), @ORM\Index(name="fk_test_socialanalysis1_idx", columns={"socialanalysis_idsocialanalysis"})})
 * @ORM\Entity
 */
class Test
{
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=45, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="locale", type="string", length=45, nullable=true)
     */
    private $locale;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="idtest", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtest;

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
     * @var \AppBundle\Entity\Socialanalysis
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Socialanalysis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="socialanalysis_idsocialanalysis", referencedColumnName="idsocialanalysis")
     * })
     */
    private $socialanalysissocialanalysis;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Question", inversedBy="testtest")
     * @ORM\JoinTable(name="test_has_question",
     *   joinColumns={
     *     @ORM\JoinColumn(name="test_idtest", referencedColumnName="idtest")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="question_idquestion", referencedColumnName="idquestion")
     *   }
     * )
     */
    private $questionquestion;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questionquestion = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set description
     *
     * @param string $description
     *
     * @return Test
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
     * Set locale
     *
     * @param string $locale
     *
     * @return Test
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Test
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get idtest
     *
     * @return integer
     */
    public function getIdtest()
    {
        return $this->idtest;
    }

    /**
     * Set professorprofessor
     *
     * @param \AppBundle\Entity\Professor $professorprofessor
     *
     * @return Test
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

    /**
     * Set socialanalysissocialanalysis
     *
     * @param \AppBundle\Entity\Socialanalysis $socialanalysissocialanalysis
     *
     * @return Test
     */
    public function setSocialanalysissocialanalysis(\AppBundle\Entity\Socialanalysis $socialanalysissocialanalysis = null)
    {
        $this->socialanalysissocialanalysis = $socialanalysissocialanalysis;

        return $this;
    }

    /**
     * Get socialanalysissocialanalysis
     *
     * @return \AppBundle\Entity\Socialanalysis
     */
    public function getSocialanalysissocialanalysis()
    {
        return $this->socialanalysissocialanalysis;
    }

    /**
     * Add questionquestion
     *
     * @param \AppBundle\Entity\Question $questionquestion
     *
     * @return Test
     */
    public function addQuestionquestion(\AppBundle\Entity\Question $questionquestion)
    {
        $this->questionquestion[] = $questionquestion;

        return $this;
    }

    /**
     * Remove questionquestion
     *
     * @param \AppBundle\Entity\Question $questionquestion
     */
    public function removeQuestionquestion(\AppBundle\Entity\Question $questionquestion)
    {
        $this->questionquestion->removeElement($questionquestion);
    }

    /**
     * Get questionquestion
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestionquestion()
    {
        return $this->questionquestion;
    }
}
