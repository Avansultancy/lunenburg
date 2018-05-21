<?php
//Namespace en uses, mag je vergeten. Moet er wel in staan!
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Bestelorder;
use AppBundle\Form\Type\BestelorderType;

class BestelorderController extends Controller
{

    /**
    * @Route("/bestelorder/alle", name="allebestelorders")
    */
    public function alleBestelorders(Request $request) {
        $bestelorder = $this->getDoctrine()->getRepository("AppBundle:Bestelorder")->findAll();
        $artikel = $this->getDoctrine()->getRepository("AppBundle:Artikel")->findAll();
        $leverancier = $this->getDoctrine()->getRepository("AppBundle:leverancier")->findAll();
        return new Response($this->render('bestelorder.html.twig', 
            array('bestelorders' => $bestelorder,'artikelen' => $artikel,'leverancieren' => $leverancier))); 
    }

    /**
    * @Route("/bestelorder/nieuw", name="nieuwebestelorder")
    */
    public function nieuweBestelorder (Request $request) {
        $nieuweBestelorder = new Bestelorder();
        $form = $this->createForm(BestelorderType::class, $nieuweBestelorder);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nieuweBestelorder);
            $em->flush();
            return $this->redirect($this->generateurl("allebestelorders"));
        }

        return new Response($this->render('form.html.twig', array('form' => $form->createView())));
    }
   /**
    * @Route("/bestelorder/wijzig/{id}", name="bestelorderwijzigen")
    */
    public function wijzigBestelorder (Request $request, $id) {
        $id = $this->getDoctrine()->getRepository("AppBundle:Bestelorder")->find($id);
        $form = $this->createForm(BestelorderType::class, $id);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($id);
            $em->flush();
            return $this->redirect($this->generateurl("bestelorderwijzigen", array("id" => $id->getid())));
        }

        return new Response($this->render('form.html.twig', array('form' => $form->createView())));
    }



}