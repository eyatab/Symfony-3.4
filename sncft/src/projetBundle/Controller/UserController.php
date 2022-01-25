<?php

namespace projetBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use projetBundle\Entity\User;
use projetBundle\Entity\Caisse;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/api_v1/users")
 */

class UserController extends Controller
{
  
    /**
     * @Route("", name="get_all_users",methods={"GET"})
     */
    public function allAction(Request $request)
    {
        $users = $this->get('doctrine.orm.entity_manager')->getRepository('projetBundle:User')->findAll();
       
        foreach ($users as $user) {
            $etat=$user->isEnabled();
            if ($etat ===true){
                $etat2="Actif";
                
            }
            else {
                $etat2="Inactif";
            }

            $roleut=$user->getRoles();
            if ($roleut === "ROLE_USER"){
                $role2="user";
                
            }
            else{
                $role2=$roleut;
            }
           
            $formatted[] = [
               'id' => $user->getId(),
               'matricule' => $user->getMatricule(),
               'nom' => $user->getNom(),
               'prenom' => $user->getPrenom(),    
               'tel' => $user->getTel(),
               'email' => $user->getEmail(),
               'username' => $user->getUsername(),
               'password' => $user->getPassword(),
               'idcaisse' => $user->getCaisseId()->getCode(),
               'enabled'=> $user->isEnabled(),
               'role'=> $role2,
             
            ];
        }
         if(!$formatted)
         {
             return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'data not found']], 404);
         }
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$formatted]]);
    }

    /**
     * @Route("/{id}", name="get_user_by_id",methods={"GET"})
     */
    public function getByIdAction($id)
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user=$repository->find($id);
        if (empty($user)) {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'data not found']], 404);
        }
        $etat=$user->isEnabled();
          
        $formatted = [
            'id' => $user->getId(),
            'matricule' => $user->getMatricule(),
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),    
            'tel' => $user->getTel(),
            'email' => $user->getEmail(),
            'idcaisse' => $user->getCaisseId()->getId(),
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
            'enabled'=> $user->isEnabled(),
            'role'=> $user->getRoles(),
        ];
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$formatted]]);

    }
    /**
     * @Route("/find/{username}", name="get_user_by_username",methods={"Get"})
     */
    public function getByUNAction($username)
    { //search by matricule aussi
     //   return new JsonResponse($req->get('username'),200);
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user=$repository->findOneByUsername($username);
        if (empty($user)) {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'data not found']], 404);
        }
        $formatted = [
            'id' => $user->getId(),
            'matricule' => $user->getMatricule(),
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),    
            'tel' => $user->getTel(),
            'idcaisse' => $user->getCaisseId()->getId(),
            'email' => $user->getEmail(),
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
            'enabled'=> $user->isEnabled(),
            'role'=> $user->getRoles(),
        ];
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$formatted]]);

    }



    /**
     * @Route("", name="add_user_by_id",methods={"POST"})
     */
    public function createAction(Request $request)
    {
       
        $em = $this->get('doctrine.orm.entity_manager');
        $idcaisse=$request->get('idcaisse');
        $idcai = $em
               ->getRepository('projetBundle:Caisse')
               ->findOneById($idcaisse);
        $user = new User();       

        $user  ->setMatricule($request->get('matricule'))
               ->setNom($request->get('nom'))
               ->setPrenom($request->get('prenom'))
               ->setTel($request->get('tel'))
               ->setEmail($request->get('email'))
               ->setRoles($request->get('role'))
               ->setUsername($request->get('matricule'))
               ->setEnabled( true)
               ->setCaisseId($idcai)
               ->setPlainPassword($request->get('password'))
               ;
       
        $em->persist($user);
        $em->flush();

        if(!$em)
        {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'ERROR']], 400);
        }
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$user]]);

    }
    /**
     * @Route("/{id}", name="restore_user_by_id",methods={"PUT"})
     */
    public function restoreAction(Request $request,$id)
    {   $em = $this->get('doctrine.orm.entity_manager');
        $idcai = $em
        ->getRepository('projetBundle:Caisse')
        ->findOneById($request->get('idcaisse'));
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user=$repository->find($id);
        if (empty($user)) {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'data not found']], 404);
        }
        $etat=$user->isEnabled();
        if ($etat ==true){
            $user->setEnabled(false);
            $etat2=$user->isEnabled();
        }
        else {
        
            $user->setEnabled(true);
            $etat2=$user->isEnabled();
        }
        if (empty($user)) {
            $user
        ->setMatricule($request->get('matricule'))
        ->setNom($request->get('nom'))
        ->setPrenom($request->get('prenom'))
        ->setTel($request->get('tel'))
        ->setEmail($request->get('email'))
        ->setRoles($request->get('role'))
        ->setEnabled(!$etat2)
        ->setCaisseId($idcai)
        ->setUsername($request->get('username'));
         return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'data not found']], 404);
        }
        
  
       
        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($user);
        $em->flush();
        if(!$em)
        {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'ERROR']], 400);
        }
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$user]]);

    }

    /**
    * @Route("/up/{id}", name="update_user_by_id",methods={"PUT"})
    */
     public function updateAction(Request $request,$id)
    {   $em = $this->get('doctrine.orm.entity_manager');
        $idcai = $em
        ->getRepository('projetBundle:Caisse')
        ->findOneById($request->get('idcaisse'));

        $repository = $this->getDoctrine()->getRepository(User::class);
        $user=$repository->find($id);
        if (empty($user)) {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'data not found']], 404);
        }
        $user
        ->setMatricule($request->get('matricule'))
        ->setNom($request->get('nom'))
        ->setPrenom($request->get('prenom'))
        ->setTel($request->get('tel'))
        ->setEmail($request->get('email'))
        ->setRoles($request->get('role'))
        ->setCaisseId($idcai)
        ->setEnabled($request->get('enabled'))
        ->setUsername($request->get('matricule'));
       
        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($user);
        $em->flush();
        if(!$em)
        {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'ERROR']], 400);
        }
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$user]]);

    }

  /**
     * @Route("/{id}", name="delete_user",methods={"DELETE"})
     */
  
    public function DeleteAction(Request $request)
    { 
        $em = $this->get('doctrine.orm.entity_manager');

        $user = $em->getRepository('projetBundle:User')
                    ->find($request->get('id'));
        /* @var $user User */
        if ($user) {
        $em->remove($user);
        $em->flush();
        return new Response('It\'s probably been deleted');
    }
    else {
        return new Response('doesn\'t exist');
    }}

    


/**
     * @Route("/findlist/{username}", name="getlist__by_username",methods={"Get"})
     */
    public function getlistAction($username)
    { 
     //   return new JsonResponse($req->get('username'),200);
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user=$repository->findOneByUsername($username);
        if (empty($user)) {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'data not found']], 404);
        }
        $formatted = [
            'id' => $user->getId(),
            'matricule' => $user->getMatricule(),
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),    
            'tel' => $user->getTel(),
            'idcaisse' => $user->getCaisseId()->getId(),
            'email' => $user->getEmail(),
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
            'enabled'=> $user->isEnabled(),
            'role'=> $user->getRoles(),
        ];
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>[$formatted]]]);

    }


 /**
     * @Route("/change/{id}/{mdp}", name="change_pass_by_id",methods={"PUT"})
     */
    public function changepassAction(Request $request,$id,$mdp)
    {  $em = $this->get('doctrine.orm.entity_manager');
        $idcai = $em
        ->getRepository('projetBundle:Caisse')
        ->findOneById($request->get('idcaisse'));
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user=$repository->find($id);
        if (empty($user)) {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'data not found']], 404);
        }
            $user
        ->setMatricule($request->get('matricule'))
        ->setNom($request->get('nom'))
        ->setPrenom($request->get('prenom'))
        ->setTel($request->get('tel'))
        ->setEmail($request->get('email'))
        ->setPasswordRequestedAt(new \DateTime('now'))
        ->setCaisseId($idcai)
        ->setUsername($request->get('username'))
        ->setPlainPassword($mdp);
        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($user);
        $em->flush();

        if(!$em)
        {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'ERROR']], 400);
        }
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$user]]);

    }







}
