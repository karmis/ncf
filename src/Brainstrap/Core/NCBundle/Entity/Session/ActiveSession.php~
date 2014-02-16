<?php

namespace Brainstrap\Core\NCBundle\Entity\Session;

use Doctrine\ORM\Mapping as ORM;

/**
 * Session
 * Набор идентификаторов позволяющий работать с разными типами сессий
 * 
 * @ORM\Table(name="sessions_active")
 * @ORM\Entity(repositoryClass="Brainstrap\Core\NCBundle\Repository\Session\SessionRepository")
 */
class ActiveSession
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
     * Тип карты для текущей сессии
     * 
     * @ORM\Column(name="typeId", type="integer")
     */
    private $typeId;

    /**
     * @var string
     * ID привязанной сессии 
     *
     * @ORM\Column(name="sessionId", type="integer")
     */
    private $sessionId;

    /**
     * @ORM\Column(name="cartId", type="integer")
     */
    private $cartId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="datetime")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="datetime")
     */
    private $endDate;

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
     * Set sessionId
     *
     * @param integer $sessionId
     * @return Session
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    /**
     * Get sessionId
     *
     * @return integer 
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Session
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
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Session
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set type
     *
     * @param \Brainstrap\Core\NCBundle\Entity\CartType $type
     * @return Session
     */
    public function setType(\Brainstrap\Core\NCBundle\Entity\CartType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Brainstrap\Core\NCBundle\Entity\CartType 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set cart
     *
     * @param \Brainstrap\Core\NCBundle\Entity\Cart $cart
     * @return Session
     */
    public function setCart(\Brainstrap\Core\NCBundle\Entity\Cart $cart = null)
    {
        $this->cart = $cart;

        return $this;
    }

    /**
     * Get cart
     *
     * @return \Brainstrap\Core\NCBundle\Entity\Cart 
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * Set typeId
     *
     * @param integer $typeId
     * @return ActiveSession
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;

        return $this;
    }

    /**
     * Get typeId
     *
     * @return integer 
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Set cartId
     *
     * @param integer $cartId
     * @return ActiveSession
     */
    public function setCartId($cartId)
    {
        $this->cartId = $cartId;

        return $this;
    }

    /**
     * Get cartId
     *
     * @return integer 
     */
    public function getCartId()
    {
        return $this->cartId;
    }
}
