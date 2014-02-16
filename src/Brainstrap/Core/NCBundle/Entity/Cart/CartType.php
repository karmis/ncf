<?php

namespace Brainstrap\Core\NCBundle\Entity\Cart;

use Doctrine\ORM\Mapping as ORM;

/**
 * CartType
 *
 * @ORM\Table(name="cart_type")
 * @ORM\Entity(repositoryClass="Brainstrap\Core\NCBundle\Repository\Cart\CartTypeRepository")
 */
class CartType
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
     * @ORM\Column(name="caption", type="string", length=255)
     */
    private $caption;

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
     * @return TypeCart
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
}
