<?php

namespace Brainstrap\Core\NCBundle\Entity\Cart;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * Cart
 *
 * @ORM\Table(name="cart")
 * @ORM\Entity(repositoryClass="Brainstrap\Core\NCBundle\Repository\Cart\CartRepository")
 * @UniqueEntity(
 *     fields={"code"},
 *     errorPath="code",
 *     message="Карта с таким кодом уже существует"
 * )
 */
class Cart
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
     * @ORM\Column(name="code", type="string", length=255, unique=true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="keyword", type="string", length=255, nullable=true)
     */
    private $keyword;

    /**
     * @ORM\ManyToOne(targetEntity="Brainstrap\Core\NCBundle\Entity\Cart\CartType")
     * @ORM\JoinColumn(name="cart_type_id", referencedColumnName="id")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="Brainstrap\Core\NCBundle\Entity\Client\Client")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registrationDate", type="datetime")
     */
    private $registrationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expiresDate", type="datetime", nullable=true)
     */
    private $expiresDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="locked", type="boolean")
     */
    private $locked;

    public function __construct()
    {
        $this->registrationDate = new \DateTime('now');
        $this->locked = false; 
    }

    public function __toString()
    {
        return $this->code;
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
     * Set code
     *
     * @param string $code
     * @return Cart
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set keyword
     *
     * @param string $keyword
     * @return Cart
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }

    /**
     * Get keyword
     *
     * @return string 
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * Set registrationDate
     *
     * @param \DateTime $registrationDate
     * @return Cart
     */
    public function setRegistrationDate($registrationDate)
    {
        $this->registrationDate = $registrationDate;

        return $this;
    }

    /**
     * Get registrationDate
     *
     * @return \DateTime 
     */
    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }

    /**
     * Set expiresDate
     *
     * @param \DateTime $expiresDate
     * @return Cart
     */
    public function setExpiresDate($expiresDate)
    {
        $this->expiresDate = $expiresDate;

        return $this;
    }

    /**
     * Get expiresDate
     *
     * @return \DateTime 
     */
    public function getExpiresDate()
    {
        return $this->expiresDate;
    }

    /**
     * Set locked
     *
     * @param boolean $locked
     * @return Cart
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;

        return $this;
    }

    /**
     * Get locked
     *
     * @return boolean 
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * Set type
     *
     * @param \Brainstrap\Core\NCBundle\Entity\Cart\CartType $type
     * @return Cart
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
     * Set client
     *
     * @param \Brainstrap\Core\NCBundle\Entity\Client\Client $client
     * @return Cart
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
