<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Menu;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/menus", name="menus_list")
     */
    public function menulistAction(Request $request){
      $menus= $this->getDoctrine()->getRepository('AppBundle:Menu')->findAll();;

      return $this->render('menus/menus_list.html.twig', array("menus"=>$menus));

    }

    /**
     * @Route("/menus/{id}", name="menu_show")
     */
    public function showMenuAction(Request $request, $id){

      $menu= $this->getDoctrine()->getRepository('AppBundle:Menu')->find($id);
      if (!$menu) {
          throw $this->createNotFoundException(
              'No product found for id '.$productId
          );
        }
      return $this->render('menus/menu_details.html.twig', array("menu"=>$menu));

    }

}
