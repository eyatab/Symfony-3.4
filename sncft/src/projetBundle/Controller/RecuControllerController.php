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
use projetBundle\Entity\Recu;
/**
 * @Route("/api_v1/recu")
 */
class RecuControllerController extends Controller
{
    /**
      * @Route("/{ref}", name="get_byref",methods={"GET"})
      */
   public function gettyperecuAction(Request $request,$ref){
    //afficher type de recu selon ref
    $em = $this->getDoctrine()->getManager('recubd'); // on appelle doctrine
    
    $query = $em->createQuery(  //creation de la requête
      'SELECT r.matricule,r.cin,r.reference,r.firstName,r.lastName,r.motif,r.sum,r.idRecuStatus,rs.id,rs.description ,rs.availableInd,rt.name
       FROM projetBundle:Recu r
       INNER JOIN projetBundle:RecuStatus rs
       with rs.id= r.idRecuStatus

       INNER JOIN projetBundle:RecuTypeUnite rtu
       with rtu.id= r.idRecuTypeUnite

       INNER JOIN projetBundle:RecuType rt
       with rt.id= rtu.idRecuType

       where r.reference = :reference 
       ')
       
        ->setParameters([
           'reference' => $ref
          

       ]);
   
      $rec = $query->getResult(); //variable qui récupère la requête


      return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$rec]]);
   }
   

}
