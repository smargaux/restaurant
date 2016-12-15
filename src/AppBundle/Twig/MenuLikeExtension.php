<?php
namespace AppBundle\Twig;
use AppBundle\Services;

class MenuLikeExtension extends \Twig_Extension
{
    private $MenuLikeService;

    public function __construct($service){
      $this->MenuLikeService=$service;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('getCountMenuLike', array($this, 'getCountMenuLike')),new \Twig_SimpleFunction('getMoyenneMenuLike', array($this, 'getMoyenneMenuLike'))
        );
    }

    public function getCountMenuLike($menuID)
    {
      $totalMenuLike=$this->MenuLikeService->getTotalVotes($menuID);
      return $totalMenuLike;
    }

    public function getMoyenneMenuLike($menuID,$countMenuLike)
    {
      $moyenneMenuLike=$this->MenuLikeService->getMoyenne($menuID,$countMenuLike);
      return $moyenneMenuLike;
    }



}

?>
