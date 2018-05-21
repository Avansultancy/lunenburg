<?php 
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Artikel;
use AppBundle\Entity\Bestelorder;

class MagazijnpositieController extends Controller
{
    /**
    * @Route("/voorraadpositie", name="voorraadpositie")
    */
    public function alleVoorraadpositie(Request $request) {
        $technischv = $this->getDoctrine()->getRepository("AppBundle:Artikel")->findAll();
        $gereserveerdv = $this->getDoctrine()->getRepository("AppBundle:Bestelorder")->findAll();
        return new Response($this->render('voorraadpositie.html.twig', 
            array('technischevoorraad' => $technischv,'gereserveerdevoorraad' => $gereserveerdv))); 
    }
       
}
 


