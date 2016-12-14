<?php
namespace AppBundle\Services;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity;
use AppBundle\Entity\Menu;
class Notes
{
    protected $em;
    public function __construct(EntityManager $em)
  {
    $this->em = $em;
  }
    public function getTotalVotes(Menu $menu)
    {
        return $this->em->getRepository("AppBundle:MenuLike")
                ->countNotesById($menu->getId());
    }
    public function getMoyenne(Menu $menu, $totalVotes)
    {
        $notes=$this->em->getRepository('AppBundle:MenuLike')
                  ->findNotesById($menu->getId());
        $noteMoyenne=0;
        foreach ($notes as $note) {
            $noteMoyenne+=$note["rating"];
        }
        $noteMoyenne=round($noteMoyenne/$totalVotes, 2);
        return $noteMoyenne;
    }
}
