<?php

namespace Brainstrap\Core\NCBundle\Entity\Reports;

use Doctrine\ORM\Mapping as ORM;

/**
 * SessionReport
 *
 * @ORM\Table("reports_session")
 * @ORM\Entity(repositoryClass="Brainstrap\Core\NCBundle\Repository\Reports\SessionReportRepository")
 */
class SessionReport
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
     * @ORM\Column(name="sessionId", type="integer")
     */
    private $sessionId;

    /**
     * @ORM\ManyToOne(targetEntity="Brainstrap\Core\NCBundle\Entity\Cart\Cart")
     * @ORM\JoinColumn(name="cart_id", referencedColumnName="id")
     */
    private $cart;

    /**
     * @var string
     *
     * @ORM\Column(name="startDate", type="datetime")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="datetime", nullable=true)
     */
    private $endDate;

    /**
     * @ORM\ManyToOne(targetEntity="Brainstrap\Core\NCBundle\Entity\Session\StatusSession")
     * @ORM\JoinColumn(name="status_session_id", referencedColumnName="id")
     */
    private $statusComplete;

    /**
     * @var string
     *
     * @ORM\Column(name="profit", type="decimal", precision=2, length=255, nullable=true)
     */
    private $profit;

    public function __construct()
    {
        // $this->status = self::STATUS_PROCESS;
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
     * Set sessionId
     *
     * @param integer $sessionId
     * @return SessionReport
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
     * @return SessionReport
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
     * @return SessionReport
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
     * Set statusComplete
     *
     * @param string $statusComplete
     * @return SessionReport
     */
    public function setStatusComplete($statusComplete)
    {
        $this->statusComplete = $statusComplete;

        return $this;
    }

    /**
     * Get statusComplete
     *
     * @return string 
     */
    public function getStatusComplete()
    {
        return $this->statusComplete;
    }

    /**
     * Set profit
     *
     * @param string $profit
     * @return SessionReport
     */
    public function setProfit($profit)
    {
        $this->profit = $profit;

        return $this;
    }

    /**
     * Get profit
     *
     * @return string 
     */
    public function getProfit()
    {
        return $this->profit;
    }

    /**
     * Set cart
     *
     * @param \Brainstrap\Core\NCBundle\Entity\Cart\Cart $cart
     * @return SessionReport
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
}
