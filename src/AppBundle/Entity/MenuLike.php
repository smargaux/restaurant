<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Validator\Constraints as MenuLikeAssert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * MenuLike
 *
 * @ORM\Table(name="menu_like")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MenuLikeRepository")
 * @UniqueEntity(
 *     fields={"menu", "user"},
 *     message="Vous avez déjà noté ce menu"
 * )
  */
class MenuLike
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")


     */
    private $id;

    /**
     * @var int
     * @Assert\NotBlank
     * @Assert\Type(type="integer")
     * @Assert\Range(
     *      min = 0,
     *      max = 5)
     * @ORM\Column(name="rating", type="integer")
     */
    private $rating=0;

    /**
     * @var int
     *
     *
     * @ORM\ManyToOne(targetEntity="Menu")
     * @ORM\JoinColumn(name="menu", referencedColumnName="id")
     */

    private $menu;

    /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=255)
     */
    private $user;

    public function __construct($rating=0, $user="", $menu=0)
    {
        $this->rating=$rating;
        $this->user=$user;
        $this->menu =$menu;
    }

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

    /**
     * Set the value of Id
     *
     * @param int id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

}
