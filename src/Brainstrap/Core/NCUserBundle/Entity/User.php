<?php
namespace Brainstrap\Core\NCUserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Iphp\FileStoreBundle\Mapping\Annotation as FileStore;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @FileStore\Uploadable
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Assert\File( maxSize="20M")
     * @FileStore\UploadableField(mapping="userAvatar")
     * @ORM\Column(type="array")
     */
    protected $userAvatar;

    public function __construct()
    {
        parent::__construct();
        // your own logic
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
     * Set userAvatar
     *
     * @param array $userAvatar
     * @return User
     */
    public function setUserAvatar($userAvatar)
    {
        $this->userAvatar = $userAvatar;

        return $this;
    }

    /**
     * Get userAvatar
     *
     * @return array 
     */
    public function getUserAvatar()
    {
        return $this->userAvatar;
    }
}
