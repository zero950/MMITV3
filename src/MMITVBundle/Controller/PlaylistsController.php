<?php
namespace MMITVBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlaylistsController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $playlist= $em->getRepository('MMITVBundle:Agenda')->findAll();

        return $this->render('MMITVBundle:Default:playlist.html.twig', array('playlist' => $playlist));
    }
}