<?php 
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\goederen;
use AppBundle\From\Type\GoederenType;

class GoederenController extends Controller
{
    /**
     * @Route("/goederen", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return new Response("Hey there");
    }


       
        /**
    * @Route("/goederen/alle", name="allegoederen")
    */
    public function alleGoederen(Request $request) 
    {
        $goederen = $this->getDoctrine()->getRepository("AppBundle:goederen")->findAll();
        $artikel = $this->getDoctrine()->getRepository("AppBundle:Artikel")->findAll();
        $leverancier = $this->getDoctrine()->getRepository("AppBundle:leverancier")->findAll();
        $status = $this->getDoctrine()->getRepository("AppBundle:status")->findAll();
        return new Response($this->render('goederen.html.twig', array('goederens' =>$goederen,'artikelen' =>$artikel,'leveranciers' =>$leverancier,'statussen' =>$status)));
    }

    /**
    * @Route("/goederen/ontvangen", name="ontvangengoederen")
    */
    public function ontvangenGoederen(Request $request)
    {
        $goederen= $this->getDoctrine()->getRepository("AppBundle:goederen")->findByStatus("2");
        $artikel = $this->getDoctrine()->getRepository("AppBundle:Artikel")->findAll();
        $leverancier = $this->getDoctrine()->getRepository("AppBundle:leverancier")->findAll();
        $status = $this->getDoctrine()->getRepository("AppBundle:status")->findAll();
        
 
        return new Response($this->render('goederen.html.twig', array('goederens' =>$goederen,'artikelen' =>$artikel,'leveranciers' =>$leverancier,'statussen' =>$status)));
    }

       
}
 


