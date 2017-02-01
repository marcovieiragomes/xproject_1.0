<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Table(name="role")
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
}
