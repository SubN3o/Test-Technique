<?php

namespace Citya\TestBundle\Controller;

use Citya\TestBundle\Entity\Contact;
use Citya\TestBundle\Form\FormulaireContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;


class FormulaireContactcontroller extends Controller
{
    /**
     * @Route("/formulaire-contact", name="formulaireContact")
     * @Method({"GET", "POST"})
     */
    public function formulaireContactAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(FormulaireContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('front/formulaireContact.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}