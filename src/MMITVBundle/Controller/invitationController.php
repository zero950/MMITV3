<?php

namespace MMITVBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MMITVBundle\Entity\Invitation;
use MMITVBundle\Form\Type\InvitationFormType;
use MMITVBundle\Entity\Email;
use MMITVBundle\Form\Type\EmailFormType;
use Symfony\Component\HttpFoundation\Request;

class InvitationController extends Controller
{
    public function indexAction(Request $request)
    {
        $email = new Email();
        $form = $this->CreateForm(new EmailFormType(),$email);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($email);
            $em->flush();

            return $this->redirect($this->generateUrl('invitation'));
        }

        return $this->render('MMITVBundle:Default:invitation.html.twig',  array('form' => $form->createView()));
    }

    public function EnvoiAction()
    {
        $em = $this->getDoctrine()->getManager();
        $email = $em->getRepository('MMITVBundle:Email')->findAll();
        $invitation = new Invitation();
        $invitation->setEmail($email[0]->getEmail());
        $invitation->send();
        $invitation->getCode();
        $em->persist($invitation);
        $em->flush();
        var_dump($invitation);

        return $this->render('MMITVBundle:Default:envoi.html.twig');
    }

    public function EmailAction()
    {
        $form = $this->createForm(new EmailFormType());
        return $this->render('MMITVBundle:Default:invitation.html.twig', array('form' => $form->createView()));
    }
}