<?php

namespace projetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\View\View;

use projetBundle\Entity\Caisse;

class CaisseController extends Controller
{
    
    public function getCaissesAction(Request $request)
    {
    
    $caisses = $this->get('doctrine.orm.entity_manager')
                ->getRepository('projetBundle:Caisse')
                ->findAll();
      /*  @var $caisses Caisse[] */
        $formatted = [];
        foreach ($caisses as $caisse) {
            $formatted[] = [
               'id' => $caisse->getId(),
               'codeC' => $caisse->getCodeC(),
               'nomC' => $caisse->getNomC(),
               'etatC' => $caisse->getEtatC(),
               'datecreation' => $caisse->getDatecreation(),
            
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
            'datecreation' => $caisse->getDatecreation(),
            
            'compteC' => $caisse->getCompteC(),
            'montantC' => $caisse->getMontantC(),
        ];

        return new JsonResponse($formatted);
    }
    public function createcaisseAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
    
        $caisse = new Caisse();
        $caisse->setCodeC($request->get('codeC'));
        $caisse ->setNomC($request->get('nomC'));
        $caisse->setEtatC($request->get('etatC'));
        $caisse->setDateCreation(new \DateTime('@'.strtotime('now')) );
        $caisse->setCompteC( $request->get('compteC'));
        $caisse->setMontantC($request->get('montantC'));

        //add to doctrine to so that it can be saved 
        $em->persist($caisse);
        
        $em->flush();

        return new Response('It\'s probably been saved');
    }
     
    public function removecaisseAction(Request $request)
    { 
        $em = $this->get('doctrine.orm.entity_manager');

        $caisse = $em->getRepository('projetBundle:Caisse')
                    ->find($request->get('caisse_id'));
        /* @var $caisse Caisse */
        if ($caisse) {
        $em->remove($caisse);
        $em->flush();
        return new Response('It\'s probably been deleted');
    }
    else {
        return new Response('doesn\'t exist');
    }}


}
