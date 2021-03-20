<?php

namespace projetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use projetBundle\Entity\Caisse;

/**
 * @Route("/api_v1/caisses")
 */
class CaisseController extends Controller
{
    /**
     * @Route("", name="get_all_caisses",methods={"GET"})
     */
    public function allAction(Request $request)
    {
        $caisses = $this->get('doctrine.orm.entity_manager')->getRepository('projetBundle:Caisse')->findAll();

        foreach ($caisses as $caisse) {
            $formatted[] = [
               'id' => $caisse->getId(),
               'codeC' => $caisse->getCodeC(),
               'nomC' => $caisse->getNomC(),
               'etatC' => $caisse->getEtatC(),
               'datecreaC' => $caisse->getDatecreaC(),
               'idcreaC' => $caisse->getIdcreaC(),
               'compteC' => $caisse->getCompteC(),
               'montantC' => $caisse->getMontantC(),
            ];
        }
         if(!$formatted)
         {
             return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'data not found']], 404);
         }
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$formatted]]);
    }

    /**
     * @Route("/{id}", name="get_caisse_by_id",methods={"GET"})
     */
    public function getByIdAction($id)
    {
        $repository = $this->getDoctrine()->getRepository(Caisse::class);
        $caisse=$repository->find($id);
        if (empty($caisse)) {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'data not found']], 404);
        }
        $formatted = [
            'id' => $caisse->getId(),
            'codeC' => $caisse->getCodeC(),
            'nomC' => $caisse->getNomC(),
            'etatC' => $caisse->getEtatC(),
            'datecreaC' => $caisse->getDatecreaC(),
            'idcreaC' => $caisse->getIdcreaC(),
            'compteC' => $caisse->getCompteC(),
            'montantC' => $caisse->getMontantC(),
        ];
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$formatted]]);

    }
    /**
     * @Route("", name="add_caisse_by_id",methods={"POST"})
     */
    public function createAction(Request $request)
    {
        $caisse = new Caisse();
        $caisse->setCodeC($request->get('codeC'))
               ->setNomC($request->get('nomC'))
               ->setEtatC($request->get('etatC'))
               ->setDateC( $request->get('datecreaC'))
               ->setIdcreaC( $request->get('idcreaC'))
               ->setCompteC( $request->get('compteC'))
               ->setMontantC($request->get('montantC'));
        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($caisse);
        $em->flush();

        if(!$em)
        {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'mouchkel']], 400);
        }
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$caisse]]);

    }

    /**
     * @Route("/{id}", name="update_caisse_by_id",methods={"PUT"})
     */
    public function updateAction(Request $request,$id)
    {
        $repository = $this->getDoctrine()->getRepository(Caisse::class);
        $caisse=$repository->find($id);
        if (empty($caisse)) {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'data not found']], 404);
        }
        $caisse->setCodeC($request->get('codeC'))
            ->setNomC($request->get('nomC'))
            ->setEtatC($request->get('etatC'))
            ->setDateC( $request->get('datecreaC'))
            ->setIdcreaC( $request->get('idcreaC'))
            ->setCompteC( $request->get('compteC'))
            ->setMontantC($request->get('montantC'));
        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($caisse);
        $em->flush();
        if(!$em)
        {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'mouchkel']], 400);
        }
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$caisse]]);

    }

}
