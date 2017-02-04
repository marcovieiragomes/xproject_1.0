<?php

namespace AppBundle\Entity;


/**
 * Dummytext
 *
 */
class Dummytext
{
    /**
     * @var string
     *
     */
    private $text;

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Dummytext
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
}
