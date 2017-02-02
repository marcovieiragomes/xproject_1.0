<?php

namespace AppBundle\Entity;

/**
 * Multicriterion - Used to build a form
 */
class Multicriterion
{

    /**
     * @var integer
     *
     */
    private $evaluation1;

    /**
     * @var integer
     *
     */
    private $evaluation2;

    /**
     * @var integer
     *
     */
    private $evaluation3;

    /**
     * Set evaluation1
     *
     * @param integer $evaluation1
     *
     * @return Criterion
     */
    public function setEvaluation1($evaluation)
    {
        $this->evaluation1 = $evaluation;

        return $this;
    }

    /**
     * Set evaluation2
     *
     * @param integer $evaluation2
     *
     * @return Criterion
     */
    public function setEvaluation2($evaluation)
    {
        $this->evaluation2 = $evaluation;

        return $this;
    }

    /**
     * Set evaluation3
     *
     * @param integer $evaluation3
     *
     * @return Criterion
     */
    public function setEvaluation3($evaluation)
    {
        $this->evaluation3 = $evaluation;

        return $this;
    }

    /**
     * Get evaluation1
     *
     * @return integer
     */
    public function getEvaluation1()
    {
        return $this->evaluation1;
    }

    /**
     * Get evaluation2
     *
     * @return integer
     */
    public function getEvaluation2()
    {
        return $this->evaluation2;
    }

    /**
     * Get evaluation3
     *
     * @return integer
     */
    public function getEvaluation3()
    {
        return $this->evaluation3;
    }
}
