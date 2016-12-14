<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MenuLike
 *
 * @ORM\Table(name="menu_like")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MenuLikeRepository")
 *
  */
class MenuLike
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id

     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="rating", type="integer", nullable=true)
     */
    private $rating;

    /**
     * @var int
     *
     * @ORM\Column(name="menu", type="integer")
     *
     * @ORM\ManyToOne(targetEntity="Menu", inversedBy="menu")
     * @ORM\JoinColumn(name="menu", referencedColumnName="id")
     */

    private $menu;

    /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=255)
     */
    private $user;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     *
     * @return MenuLike
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return int
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set menu
     *
     * @param integer $menu
     *
     * @return MenuLike
     */
    public function setMenu($menu)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get menu
     *
     * @return int
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * Set user
     *
     * @param string $user
     *
     * @return MenuLike
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }
}
