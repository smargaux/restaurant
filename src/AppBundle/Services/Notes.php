<?php
namespace AppBundle\Services;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity;
use AppBundle\Entity\Menu;

class Notes
{
    /*protected $em;
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }*/

    private $doctrine;

    public function __construct($doctrine){
      $this->doctrine=$doctrine;
    }
  /**
   * [getTotalVotes Retourne le nombre de notes d'un menu]
   * @param  Menu   $menu
   * @return int nombre de
   */
    public function getTotalVotes($menuid)
    {
        return $this->doctrine->getRepository("AppBundle:MenuLike")
                ->countNotesById($menuid);
    }
    public function getMoyenne($menuid, $totalVotes)
    {
        $notes=$this->doctrine->getRepository('AppBundle:MenuLike')
                  ->findNotesById($menuid);
        $noteMoyenne=0;
        foreach ($notes as $note) {
            $noteMoyenne+=$note["rating"];
        }
        $noteMoyenne=round($noteMoyenne/$totalVotes, 2);
        return $noteMoyenne;
    }
}
