<?php

namespace Brainstrap\Core\NCBundle\Entity\Session;

use Doctrine\ORM\Mapping as ORM;

/**
 * GroupSession
 *
 * @ORM\Table(name="statuses_session")
 * @ORM\Entity(repositoryClass="Brainstrap\Core\NCBundle\Repository\Session\StatusSessionRepository")
 */
class StatusSession
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $caption;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    public function __toString()
    {
        return $this->caption;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set caption
     *
     * @param string $caption
     * @return StatusSession
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Get caption
     *
     * @return string 
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return StatusSession
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
}
