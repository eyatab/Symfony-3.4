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

class CaisseController extends Controller
{
    public function getCaissesAction(Request $request)
    {
        $caisses = $this->get('doctrine.orm.entity_manager')
                ->getRepository('projetBundle:Caisse')
                ->findAll();
        /* @var $caisses Caisse[] */

        $formatted = [];
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

        return new JsonResponse($formatted);
    }

    public function getCaissebyidAction(Request $request)
    {
        $caisse = $this->get('doctrine.orm.entity_manager')
                ->getRepository('projetBundle:Caisse')
                ->find($request->get('caisse_id'));
        /* @var $caisse Caisse */
        if (empty($caisse)) {
            return new JsonResponse(['message' => 'Caisse not found'], Response::HTTP_NOT_FOUND);
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

        return new JsonResponse($formatted);
    }
    public function createcaisseAction(Request $request)
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

        return $caisse;
         
    
       
    }
     


}
