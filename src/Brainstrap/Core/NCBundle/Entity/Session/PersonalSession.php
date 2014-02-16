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
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="datetime", nullable=true)
     */
    private $startDate;

    /**
     * @ORM\ManyToOne(targetEntity="Brainstrap\Core\NCBundle\Entity\Session\StatusSession")
     * @ORM\JoinColumn(name="status_session_id", referencedColumnName="id")
     */
    private $statusComplete;

    public function __construct()
    {
        $this->startDate = new \DateTime('now');
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
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return PersonalSession
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
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
     * Set type
     *
     * @param \Brainstrap\Core\NCBundle\Entity\Cart\CartType $type
     * @return PersonalSession
     */
    public function setType(\Brainstrap\Core\NCBundle\Entity\Cart\CartType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Brainstrap\Core\NCBundle\Entity\Cart\CartType 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set statusComplete
     *
     * @param \Brainstrap\Core\NCBundle\Entity\Session\StatusSession $statusComplete
     * @return PersonalSession
     */
    public function setStatusComplete(\Brainstrap\Core\NCBundle\Entity\Session\StatusSession $statusComplete = null)
    {
        $this->statusComplete = $statusComplete;

        return $this;
    }

    /**
     * Get statusComplete
     *
     * @return \Brainstrap\Core\NCBundle\Entity\Session\StatusSession 
     */
    public function getStatusComplete()
    {
        return $this->statusComplete;
    }
}
