<?php

namespace projetBundle\Controller;

namespace projetBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use projetBundle\Entity\RecuType;
/**
 * @Route("/api_v1/recuType")
 */
class RecuTypeController extends Controller
{
    /**
     * @Route("/{type}", name="get_all_receipts",methods={"GET"})
     */
    public function gettyperecuAction(Request $request,$type){

     //afficher type de recu selon $type (E or D)
     $em = $this->getDoctrine()->getManager('recubd'); // on appelle doctrine
     $query = $em->createQuery( //creation de la requête
       'SELECT r.name
        FROM projetBundle:RecuType r
        where r.encaissement = :encaissement 
        ')
         ->setParameters([
            'encaissement' => $type 
        ]);
    
       $rec = $query->getResult(); //variable qui récupère la requête
       
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$rec]]);
    }

 

    
}
