<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="menu")
 */
class Menu
{
  /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
       * @ORM\Column(type="string", length=100)
       */
  private $name;

  /**
     * @ORM\Column(type="text")
     */
  private $description;

  /**
     * @ORM\Column(type="string", length=100)
     */
  private $ingredients;

  public function __construct($name,$description,$ingredients){
    $this->name=$name;
    $this->description=$description;
    $this->ingredients =$ingredients;
  }



    /**
     * Get the value of Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of Ingredients
     *
     * @return string
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }


    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

}

?>
