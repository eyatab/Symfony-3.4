<?php

namespace projetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use projetBundle\Entity\Typetransaction;
/**
 * @Route("/api_v1/typetransaction")
 */
class TypetransactionController extends Controller
{
    /**
    * @Route("", name="get_all_typetransaction",methods={"GET"})
    */
   public function allAction(Request $request)
   {
       $typetransactions = $this->get('doctrine.orm.entity_manager')->getRepository('projetBundle:Typetransaction')->findAll();

       foreach ($typetransactions as $typetransaction) {
          $formatted[] = [
              'id' => $typetransaction->getId(),
              'nom' => $typetransaction->getNom(),
              'code' => $typetransaction->getCode(),
              'typeoperation' => $typetransaction->getTypeoperation(),
           ];
       }
        if(!$formatted)
        {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'data not found']], 404);
        }
       return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$formatted]]);
   }
   
/**
    * @Route("/{x}", name="get_typetransaction",methods={"GET"})
    */
    public function getbytAction($x){
        $repository = $this->getDoctrine()
                   ->getManager()
                   ->getRepository('projetBundle:Typetransaction');
        $typetransactions =$repository->findBy(array('typeoperation' =>$x));
      
        if (empty($typetransactions)) {
         return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'data not found']], 404);
     }
     foreach($typetransactions as $typetransaction)

     {  
        $formatted[] = [
            'id' => $typetransaction->getId(),
            'nom' => $typetransaction->getNom(),
            'code' => $typetransaction->getCode(),
            'typeoperation' =>$typetransaction->getTypeoperation(),
         ];
     } 
            return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$formatted]]);
    }
   
    /**
      * @Route("", name="add_typetransaction",methods={"POST"})
      */

      public function createAction(Request $request)
      {
          $typetransaction = new Typetransaction();
  
          $typetransaction->
                
                 setNom($request->get('nom'))
                 ->setCode($request->get('code'))
                 ->setTypeoperation($request->get('typeoperation'))
               
                 ;
          $em = $this->get('doctrine.orm.entity_manager');
          $em->persist($typetransaction);
          $em->flush();
  
          if(!$em)
          {
              return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'ERROR']], 400);
          }
          return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$typetransaction]]);
  
      }

/**
     * @Route("/{trid}", name="delete_operation",methods={"DELETE"})
     */
  
    public function DeleteAction(Request $request)
    { 
        $em = $this->get('doctrine.orm.entity_manager');

        $typetransaction = $em->getRepository('projetBundle:Typetransaction')
                    ->find($request->get('trid'));
        /* @var $operation Operation */
        if ($typetransaction) {
        $em->remove($typetransaction);
        $em->flush();
        return new Response('It\'s probably been deleted');
    }
    else {
        return new Response('doesn\'t exist');
    }}


}
