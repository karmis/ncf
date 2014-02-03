<?php

namespace Brainstrap\Core\NCBundle\Entity\Session;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonalSession
 *
 * @ORM\Table(name="sessions_personal")
 * @ORM\Entity(repositoryClass="Brainstrap\Core\NCBundle\Repository\Session\PersonalSessionRepository")
 */
class PersonalSession
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
     * @ORM\ManyToOne(targetEntity="Brainstrap\Core\NCBundle\Entity\Cart\Cart")
     * @ORM\JoinColumn(name="cart_id", referencedColumnName="id")
     */
    private $cart;

    /**
     * @ORM\ManyToOne(targetEntity="Brainstrap\Core\NCBundle\Entity\Client\Client")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
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
     * @return PersonalSession
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
     * @return PersonalSession
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
