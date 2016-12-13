<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Menu;
use AppBundle\Form\MenuType;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
    public function menulistAction(Request $request)
    {
        $menus= $this->getDoctrine()->getRepository('AppBundle:Menu')->findAll();
        ;

        return $this->render('menus/menus_list.html.twig', array("menus"=>$menus));
    }

    /**
     * @Route("/menus/{id}", name="menu_show")
     */
    public function showMenuAction(Request $request, $id)
    {
        //$menu= $this->getDoctrine()->getRepository('AppBundle:Menu')->findOneByName($name);
        //findOneBy(['name'=>$name])
        //find($id) (la clé primaire)

        $em = $this->getDoctrine()->getManager();
        $menu = $em->getRepository('AppBundle:Menu')
                    ->findOneMenuByID($id);
        if (is_null($menu)) {
            throw $this->createNotFoundException(
              'Pas de menu trouvé avec le nom '.$name
          );
        }
        return $this->render('menus/menu_details.html.twig', array("menu"=>$menu));
    }

    /**
     * @Route("/new", name="menu_new")
     */
    public function newMenuAction(Request $request)
    {
        $menu = new Menu();
        $form = $this->createForm(MenuType::class, $menu);
        //$form->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $menu = $form->getData();

        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
         $em = $this->getDoctrine()->getManager();
            $em->persist($menu);
            $em->flush();

            return $this->redirectToRoute('menus_list');
        }

        return $this->render('menus/new.html.twig', array(
        'form' => $form->createView(),
      ));
    }

    /**
     * @Route("menus/{id}/edit",name="menu_edit")
     */
    public function editMenuAction(Request $request, $id)
    {
        $em= $this->getDoctrine()->getEntityManager();
        $menu = $em->getRepository('AppBundle:Menu')->find($id);
        $form = $this->createForm(MenuType::class, $menu);
        $form->setData($menu);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
          $menu = $form->getData();
          $em = $this->getDoctrine()->getManager();
          // empile les requêtes insert
          $em->persist($menu);
          //envoie les requêtes à la base de données flush($entite) verifie si l'entité que l'on souhaite est modifiée
          $em->flush($menu);

              return $this->redirectToRoute('menu_show', array('id'=>$id));
        }
        return $this->render('menus/new.html.twig', array(
       'form' => $form->createView(),
       ));
    }
}
