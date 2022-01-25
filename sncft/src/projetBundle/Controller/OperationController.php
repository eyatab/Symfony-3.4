<?php

namespace projetBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use projetBundle\Entity\Operation;
/**
 * @Route("/api_v1/operation")
 */
class OperationController extends Controller
{    /**
    * @Route("/find/{id}", name="get_op_by_id",methods={"GET"})
    */
   public function getByIdAction($id)
   {
       $repository = $this->getDoctrine()->getRepository(Operation::class);
       $operation=$repository->find($id);
       if (empty($operation)) {
           return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'data not found']], 404);
       }
       $formatted[] = [
        'id' => $operation->getId(),
        'matricule' => $operation->getMatricule(),
        'reference' => $operation->getReference(),
        'nom' => $operation->getNom(),
        'prenom' => $operation->getPrenom(),
        'somme' => $operation->getSomme(),
        'typerecu' => $operation->getTyper(),
        'motif' => $operation->getMotif(),
        'cin' => $operation->getCin(),
        'idbanque' => $operation->getBanqueId()->getCode(),
        'datecreation' => $operation->getDatecreation()->format('Y-m-d'),
        'typeoperation' => $operation->getTypeoperation(),
        'arretee' => $operation->getArretee(),
        'imprimee' => $operation->getImprimee(),
     ];
       return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$formatted]]);

   }

    /**
    * @Route("", name="get_all_operations",methods={"GET"})
    */
   public function allAction(Request $request)
   {
       $operations = $this->get('doctrine.orm.entity_manager')->getRepository('projetBundle:Operation')->findAll();
       foreach ($operations as $operation) {
        $top=$operation->getTypeoperation();
        $tr=$operation->getTyper();
        if ($top=='E' && $tr=="ALM"){
            $formatted[] = [
                'id' => $operation->getId(),
                'matricule' => $operation->getMatricule(),
                'reference' => $operation->getReference(),
                'nom' => $operation->getNom(),
                'prenom' => $operation->getPrenom(),
                'somme' => $operation->getSomme(),
                'typerecu' => $operation->getTyper(),
                'motif' => $operation->getMotif(),
                'cin' => $operation->getCin(),
                'idbanque' => $operation->getBanqueId()->getId(),
                'datecreation' => $operation->getDatecreation()->format('Y-m-d'),
                'typeoperation' => $operation->getTypeoperation(),
                'arretee' => $operation->getArretee(),
                'imprimee' => $operation->getImprimee(),
             ];
            
        }
             else {
            
                 $formatted[] = [
                    'id' => $operation->getId(),
                    'matricule' => $operation->getMatricule(),
                    'reference' => $operation->getReference(),
                    'nom' => $operation->getNom(),
                    'prenom' => $operation->getPrenom(),
                    'somme' => $operation->getSomme(),
                    'typerecu' => $operation->getTyper(),
                    'motif' => $operation->getMotif(),
                    'cin' => $operation->getCin(),
                    //'idbanque' => $operation->getBanqueId(),
                    'datecreation' => $operation->getDatecreation()->format('Y-m-d'),
                    'typeoperation' => $operation->getTypeoperation(),
                    'arretee' => $operation->getArretee(),
                    'imprimee' => $operation->getImprimee(),
                 ];
                }
            }
        if(!$formatted)
        {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'data not found']], 404);
        }
       return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$formatted]]);
   }

     /**
      * @Route("", name="add_operation",methods={"POST"})
      */

      public function createAction(Request $request)
      {   $em = $this->get('doctrine.orm.entity_manager');
         
          $idbanque=$request->get('idbanque');

          $idcaissier=$request->get('idcaissier');
          $idc = $em
          ->getRepository('projetBundle:User')
          ->findOneById($idcaissier);

          if($idbanque==0){$idban=null;}
          else {
          $idban = $em
                 ->getRepository('projetBundle:Banque')
                 ->findOneById($idbanque);}
         
                 
                 
          $operation = new Operation();
  
          $operation->setMatricule($request->get('matricule'))
                 ->setReference($request->get('reference'))
                 ->setPrenom($request->get('prenom'))
                 ->setNom($request->get('nom'))
                 ->setCin($request->get('cin'))
                 ->setMotif($request->get('motif'))
                 ->setSomme($request->get('somme'))
                 ->setTyper($request->get('typerecu'))
                 ->setDatecreation(new \DateTime('now')) 
                 ->setTypeoperation($request->get('typeoperation'))
                 ->setBanqueId($idban)
                 ->setUserId($idc)
                 ->setArretee(false)
                 ->setImprimee(false)
                 ;
          $em = $this->get('doctrine.orm.entity_manager');
          $em->persist($operation);
          $em->flush();
  
          if(!$em)
          {
              return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'ERROR']], 400);
          }
          return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$operation]]);
  
      }


    /**
    * @Route("/up/{id}", name="update_op_by_id",methods={"PUT"})
    */
    public function updateAction(Request $request,$id)
    { 
        $repository = $this->getDoctrine()->getRepository(Operation::class);
        $operation=$repository->find($id);
        if (empty($operation)) {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'data not found']], 404);
        }
        $operation->setMatricule($request->get('matricule'))
                 ->setReference($request->get('reference'))
                 ->setPrenom($request->get('prenom'))
                 ->setNom($request->get('nom'))
                 ->setCin($request->get('cin'))
                 ->setMotif($request->get('motif'))
                 ->setSomme($request->get('somme'))
                 ->setTyper($request->get('typerecu'))
                 ->setDatecreation($request->get('datecreation')) 
                 ->setTypeoperation($request->get('typeoperation'))
                 ->setArretee($request->get('arretee'))
                 ->setImprimee($request->get('imprimee'))
                 ;
       
        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($operation);
        $em->flush();
        if(!$em)
        {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'ERROR']], 400);
        }
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$operation]]);

    }
    /**
     * @Route("/{opid}", name="delete_operation",methods={"DELETE"})
     */
  
    public function DeleteAction(Request $request)
    { 
        $em = $this->get('doctrine.orm.entity_manager');

        $operation = $em->getRepository('projetBundle:Operation')
                    ->find($request->get('opid'));
        /* @var $operation Operation */
        if ($operation) {
        $em->remove($operation);
        $em->flush();
        return new Response('It\'s probably been deleted');
    }
    else {
        return new Response('doesn\'t exist');
    }}

    /**
        * @Route("/{top}", name="get_operation_by_top",methods={"GET"})
        */
    
    public function getByTopAction($top)
    {   
        if ($top=='D'){}
   
        $d= (new \DateTime());
        $repository = $this->getDoctrine()
        ->getManager()
        ->getRepository('projetBundle:Operation');
        $operations=$repository->findBy(array('typeoperation' =>$top,'datecreation' => $d));
        
        if (empty($operations)) {
            $operation = new Operation();
            $formatted[] = [
                'id' => "0",
                'matricule' => "Pas d'operation",
                'reference' => "",
                'nom' => "",
                'prenom' => "",
                'somme' => "",
                'typer' => "",
                'motif' => "",
                'cin' => "",
                'datecreation' => $d->format('Y-m-d'),
                'idbanque' => "",
                'typeoperation' => $top,
                'arretee' => false,
                'imprimee' => false,
             ];
            return new JsonResponse(['result' => ['success'=>'false','message'=>'null','data'=>$formatted]]);
        }
        if ($top=='E'){
        foreach($operations as $operation)
        {  $formatted[] = [
            'id' => $operation->getId(),
            'matricule' => $operation->getMatricule(),
            'reference' => $operation->getReference(),
            'nom' => $operation->getNom(),
            'prenom' => $operation->getPrenom(),
            'somme' => $operation->getSomme(),
            'typerecu' => $operation->getTyper(),
            'motif' => $operation->getMotif(),
            'cin' => $operation->getCin(),
      
            'datecreation' => $operation->getDatecreation()->format('Y-m-d'),
            'typeoperation' => $operation->getTypeoperation(),
            'arretee' => $operation->getArretee(),
            'imprimee' => $operation->getImprimee(),
         ];}}
         else {
            foreach($operations as $operation)
            {  $formatted[] = [
                'id' => $operation->getId(),
                'matricule' => $operation->getMatricule(),
                'reference' => $operation->getReference(),
                'nom' => $operation->getNom(),
                'prenom' => $operation->getPrenom(),
                'somme' => $operation->getSomme(),
                'typerecu' => $operation->getTyper(),
                'motif' => $operation->getMotif(),
                'cin' => $operation->getCin(),
                'idbanque' => $operation->getBanqueId(),
                'datecreation' => $operation->getDatecreation()->format('Y-m-d'),
                'typeoperation' => $operation->getTypeoperation(),
                'arretee' => $operation->getArretee(),
                'imprimee' => $operation->getImprimee(),
             ];}
         }
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$formatted]]);

    }
    /**
      * @Route("/historique/get", name="get_histo_operations",methods={"GET"})
      */
    public function histoAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager('default'); // on appelle doctrine
    
        $query = $em->createQuery(  //creation de la requête
          'SELECT o.matricule,o.reference,o.somme,o.datecreation,o.typer,o.typeoperation,u.id,cai.id,cai.code
           FROM projetBundle:Operation o
           INNER JOIN projetBundle:User u
           with u.id= o.user
           
           INNER JOIN projetBundle:Caisse cai
           with cai.id= u.caisse
           ');
           
          $rec = $query->getResult();
           //variable qui récupère la requête
          
    
          return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$rec]]);
      
        } 

    /**
      * @Route("/historique/getbydate/{dte}", name="get_histodate_operations",methods={"GET"})
      */
    public function histodateAction(Request $request,$dte)
    {                                                      

        $em = $this->getDoctrine()->getManager('default'); // on appelle doctrine
    
        $query = $em->createQuery(  //creation de la requête
          'SELECT o.matricule,o.reference,o.somme,o.datecreation,o.typer,o.typeoperation,u.id,cai.id,cai.code
           FROM projetBundle:Operation o

           INNER JOIN projetBundle:User u
           with u.id= o.user
           
           INNER JOIN projetBundle:Caisse cai
           with cai.id= u.caisse

           where o.datecreation= :datecreation
           ')
            ->setParameters([
                'datecreation' => $dte
     
            ]);
           
          $rec = $query->getResult();
           //variable qui récupère la requête
          
    
          return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>[$rec]]]);
      
        } 



 /**
    * @Route("/sumby/{id}/{typeop}", name="get_sumby_id",methods={"GET"})
    */
    public function getSumByIdAction($id,$typeop)
    {   $d= $d= (new \DateTime());
        $d2=$d->format('Y-m-d');
        $em = $this->getDoctrine()->getManager('default'); // on appelle doctrine
      $query = $em->createQuery(  //creation de la requête
          'SELECT sum (o.somme) as som
           FROM projetBundle:Operation o

           where  o.datecreation =:datecreation and o.typeoperation = :typeoperation and o.user = :caissierId
       ')
        ->setParameters([
           'datecreation' => $d2,
           'typeoperation' => $typeop,
           'caissierId'=> $id
          
       ]);

          $rec = $query->getResult();
           //variable qui récupère la requête
          
    
          return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$rec]]);
      
        } 

















        
}


















