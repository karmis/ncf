<?php

namespace Brainstrap\Core\NCBundle\Entity\Session;

use Doctrine\ORM\Mapping as ORM;

/**
 * GroupSession
 */
class GroupSession
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Brainstrap\Core\NCBundle\Entity\Cart\Cart
     */
    private $cart;

    /**
     * @var \Brainstrap\Core\NCBundle\Entity\Client\Client
     */
    private $client;


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
     * Set cart
     *
     * @param \Brainstrap\Core\NCBundle\Entity\Cart\Cart $cart
     * @return GroupSession
     */
    public function setCart(\Brainstrap\Core\NCBundle\Entity\Cart\Cart $cart = null)
    {
        $this->cart = $cart;

        return $this;
    }

    /**
     * Get cart
     *
     * @return \Brainstrap\Core\NCBundle\Entity\Cart\Cart 
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * Set client
     *
     * @param \Brainstrap\Core\NCBundle\Entity\Client\Client $client
     * @return GroupSession
     */
    public function setClient(\Brainstrap\Core\NCBundle\Entity\Client\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Brainstrap\Core\NCBundle\Entity\Client\Client 
     */
    public function getClient()
    {
        return $this->client;
    }
}
