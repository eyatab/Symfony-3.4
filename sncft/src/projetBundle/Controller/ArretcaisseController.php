<?php

namespace projetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use projetBundle\Entity\Arretcaisse;

/**
 * @Route("/api_v1/arretcaisses")
 */
class ArretcaisseController extends Controller
{
    /**
     * @Route("", name="add_arret",methods={"POST"})
     */
    public function createAction(Request $request)
    {   $em = $this->get('doctrine.orm.entity_manager');
        $idcaissier=$request->get('idcaissier');
        $idcaissier2 = $em
               ->getRepository('projetBundle:User')
               ->findOneById($idcaissier);
        $arret = new Arretcaisse();
        $arret->setDatejour(new \DateTime('now'))
               ->setMontantdeb($request->get('montantdeb'))
               ->setMontantfin($request->get('montantfin'))
               ->setDecai($request->get('decai')) 
               ->setEncai($request->get('encai'))
               ->setArretee(True)
               ->setUserId($idcaissier2);
        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($arret);
        $em->flush();

        if(!$em)
        {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'ERROR']], 400);
        }
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=> $arret]]);

    }
    
    /**
     * @Route("/{id}", name="get_arretcaisse_by_id",methods={"GET"})
     */
    public function getByIdAction($id)
    {   
        $repository = $this->getDoctrine()
        ->getManager()
        ->getRepository('projetBundle:Arretcaisse');
        $d= (new \DateTime());
        $arretcaisses=$repository->findBy(array('id_caisse' =>$id,'datejour' => $d));
        
        if (empty($arretcaisses)) {
            return new JsonResponse(['result' => ['success'=>'false','message'=>'null','data'=>null]]);
        }
      
        foreach($arretcaisses as $arretcaisse)
        {  $formatted[] = [
            'id' => $arretcaisse->getId(),
            'idcaisse' => $arretcaisse->getCaisseId()->getCode(),
            'datejour' => $arretcaisse->getDatejour()->format('Y-m-d'),
            'montantdeb' => $arretcaisse->getMontantdeb(),
            'montantfin' => $arretcaisse->getMontantfin(),
            'decai' => $arretcaisse->getDecai(),
            'encai' => $arretcaisse->getEncai(),
            'arretee' => $arretcaisse->getArretee(),
        
         ];}
        
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$formatted]]);

    }

 
    




    
}