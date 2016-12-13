<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MenuRepository")
 * @ORM\Table(name="menu")
 * @Vich\Uploadable
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

  /**
       * NOTE: This is not a mapped field of entity metadata, just a simple property.
       *
       * @Vich\UploadableField(mapping="menu_image", fileNameProperty="imageName")
       *
       * @var File
       */
  private $imageFile;

  /**
    * @ORM\Column(type="string", length=255)
    *
    * @var string
    */
   private $imageName;

   /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;


    public function __construct($name=false, $description=false, $ingredients=false, $imageFile=false, $imageName=false)
    {
        $this->name=$name;
        $this->description=$description;
        $this->ingredients =$ingredients;
        $this->imageFile =$imageFile;
        $this->imageName=$imageName;
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


    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the value of Name
     *
     * @param mixed name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the value of Description
     *
     * @param mixed description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set the value of Ingredients
     *
     * @param mixed ingredients
     *
     * @return self
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;

        return $this;
    }


    /**
         * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
         * of 'UploadedFile' is injected into this setter to trigger the  update. If this
         * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
         * must be able to accept an instance of 'File' as the bundle will inject one here
         * during Doctrine hydration.
         *
         * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
         *
         * @return Product
         */
        public function setImageFile(File $image = null)
        {
            $this->imageFile = $image;

            //Si l'image est modifiée, on modifie le champs UpdatedAt
            if ($image instanceof UploadedFile) {
                $this->updatedAt = new \DateTime('now');
            }
            return $this;
        }

        /**
         * @return File|null
         */
        public function getImageFile()
        {
            return $this->imageFile;
        }

        /**
         * @param string $imageName
         *
         * @return Product
         */
        public function setImageName($imageName)
        {
            $this->imageName = $imageName;

            return $this;
        }

        /**
         * @return string|null
         */
        public function getImageName()
        {
            return $this->imageName;
        }
}
