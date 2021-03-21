<?php

namespace projetBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use projetBundle\Entity\Banque;


/**
 * @Route("/api_v1/banques")
 */
class BanqueController extends Controller
{
    /**
     * @Route("", name="get_all_banques",methods={"GET"})
     */
    public function allAction(Request $request)
    {
        $banques = $this->get('doctrine.orm.entity_manager')->getRepository('projetBundle:Banque')->findAll();

        foreach ($banques as $banque) {
            $formatted[] = [
               'id' => $banque->getId(),
               'codeB' => $banque->getCodeB(),
               'raisonSB' => $banque->getRaisonSB(),
               'codeComptableB' => $banque->getCodeComptableB(),
               'rib' => $banque->getRib(),
               'etat' => $banque->getEtat(),
               'datecreation' => $banque->getDatecreation()->format('Y-m-d'),
            ];
        }
         if(!$formatted)
         {
             return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'data not found']], 404);
         }
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$formatted]]);
    }
    
    /**
     * @Route("/{id}", name="get_banque_by_id",methods={"GET"})
     */
    public function getByIdAction($id)
    {
        $repository = $this->getDoctrine()->getRepository(Banque::class);
        $banque=$repository->find($id);
        if (empty($banque)) {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'data not found']], 404);
        }
        $formatted = [
            'id' => $banque->getId(),
            'codeB' => $banque->getCodeB(),
            'raisonSB' => $banque->getRaisonSB(),
            'codeComptableB' => $banque->getCodeComptableB(),
            'rib' => $banque->getRib(),
            'etat' => $banque->getEtat(),
            'datecreation' => $banque->getDatecreation()->format('Y-m-d'),
        ];
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$formatted]]);

    }
    
    /**
     * @Route("/{id}", name="update_banque_by_id",methods={"PUT"})
     */
    public function updateAction(Request $request,$id)
    {
        $repository = $this->getDoctrine()->getRepository(Banque::class);
        $banque=$repository->find($id);
        if (empty($banque)) {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'data not found']], 404);
        }
        $banque->setCodeB($request->get('codeB'))
               ->setRaisonSB($request->get('raisonSB'))
               ->setCodeComptableB($request->get('codeComptableB'))
               ->setRib( $request->get('rib')) 
               ->setEtat( $request->get('etat'))
               ->setDatecreation($request->get('datecreation'));
        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($banque);
        $em->flush();
        
        if(!$em)
        {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'ERROR']], 400);
        }
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$banque]]);

    }
    /**
     * @Route("", name="add_banque_by_id",methods={"POST"})
     */
    public function createAction(Request $request)
    {
        $banque = new Banque();
        $banque->setCodeB($request->get('codeB'))
               ->setRaisonSB($request->get('raisonSB'))
               ->setCodeComptableB($request->get('codeComptableB'))
               ->setRib( $request->get('rib')) 
               ->setEtat( $request->get('etat'))
               ->setDatecreation($request->get('datecreation'));
        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($banque);
        $em->flush();

        if(!$em)
        {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'ERROR']], 400);
        }
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$banque]]);

    }
  /**
     * @Route("/{id}", name="delete_banque",methods={"DELETE"})
     */
  
    public function DeleteAction(Request $request)
    { 
        $em = $this->get('doctrine.orm.entity_manager');

        $banque = $em->getRepository('projetBundle:Banque')
                    ->find($request->get('id'));
        /* @var $banque Banque */
        if ($banque) {
        $em->remove($banque);
        $em->flush();
        return new Response('It\'s probably been deleted');
    }
    else {
        return new Response('doesn\'t exist');
    }}












}
