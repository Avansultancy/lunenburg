<?php
//Namespace en uses, mag je vergeten. Moet er wel in staan!
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Artikel;
use AppBundle\Form\Type\ArtikelType;

class ArtikelController extends Controller
{

    /**
    * @Route("/artikel/alle", name="alleartikelen")
    */
    public function alleArtikelen(Request $request) {
        $artikel = $this->getDoctrine()->getRepository("AppBundle:Artikel")->findAll();

        return new Response($this->render('index.html.twig', array('artikelen' => $artikel))); 
    }


	/**
    * @Route("/artikel/nieuw", name="nieuweartikel")
    */
    public function nieuweArtikel (Request $request) {
        $nieuweArtikel = new Artikel();
        $form = $this->createForm(ArtikelType::class, $nieuweArtikel);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if ($nieuweArtikel->getAantalVoorraad() > $nieuweArtikel->getMinimaleVoorraad()) {
                $nieuweArtikel->setBestelserie(0);
            }else {
                $nieuweArtikel->setBestelserie($nieuweArtikel->getMinimaleVoorraad() - $nieuweArtikel->getAantalVoorraad());
            }
            $em->persist($nieuweArtikel);
            $em->flush();
            return $this->redirect($this->generateUrl("alleartikelen"));
        }

        return new Response($this->render('form.html.twig', array('form' => $form->createView())));
    }
   /**
    * @Route("/artikel/bekijken/{id}", name="artikelbekijken")
    */
    public function toonArtikel(Artikel $artikel)
    {
        $deleteForm = $this->createDeleteForm($artikel);

        return $this->render('show.html.twig', array(
            'artikel' => $artikel,
            'delete_form' => $deleteForm->createView(),
        ));
    }
   /**
    * @Route("/artikel/wijzig/{id}", name="artikelwijzigen")
    */
    public function wijzigArtikel (Request $request, $id) {
        $id = $this->getDoctrine()->getRepository("AppBundle:Artikel")->find($id);
        $form = $this->createForm(artikelType::class, $id);
        $deleteForm = $this->createDeleteForm($id);



        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if ($id->getAantalVoorraad() > $id->getMinimaleVoorraad()) {
                $id->setBestelserie(0);
            }else {
                $id->setBestelserie($id->getMinimaleVoorraad() - $id->getAantalVoorraad());
            }
            $em->persist($id);
            $em->flush();
            return $this->redirect($this->generateurl("alleartikelen", array("id" => $id->getid())));
        }

        return new Response($this->render('edit.html.twig', 
            array(
                'form' => $form->createView(),
                'delete_form' => $deleteForm->createView())));
    }

    /**
    * @Route("/artikel/verwijder/{id}", name="artikelverwijderen")
    */
    public function verwijderArtikel (Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $verwijderArtikel = $em->getRepository("AppBundle:Artikel")->find($id);
        $em->remove($verwijderArtikel);
        $em->flush(); 
        return $this->redirect($this->generateurl("alleartikelen"));
    }

    private function createDeleteForm(Artikel $artikel)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('artikelverwijderen', array('id' => $artikel->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

}