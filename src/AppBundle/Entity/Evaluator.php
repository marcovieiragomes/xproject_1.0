<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluator
 *
 * @ORM\Table(name="evaluator")
 * @ORM\Entity
 */
class Evaluator
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="idevaluator", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idevaluator;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return Evaluator
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
     * Get idevaluator
     *
     * @return integer
     */
    public function getIdevaluator()
    {
        return $this->idevaluator;
    }
}
