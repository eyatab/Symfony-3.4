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
            $formatted[] = [
               'id' => $user->getId(),
               'matricule' => $user->getMatricule(),
               'nom' => $user->getNom(),
               'prenom' => $user->getPrenom(),    
               'tel' => $user->getTel(),
               'email' => $user->getEmail(),
               'username' => $user->getUsername(),
               'password' => $user->getPassword(),
               'Etat compte'=> $user->isEnabled(),
               'role'=> $user->getRoles(),
             
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
        $formatted = [
            'id' => $user->getId(),
            'matricule' => $user->getMatricule(),
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),    
            'tel' => $user->getTel(),
            'email' => $user->getEmail(),
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
            'Etat compte'=> $user->isEnabled(),
            'role'=> $user->getRoles(),
        ];
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$formatted]]);

    }
    /**
     * @Route("", name="add_user_by_id",methods={"POST"})
     */
    public function createAction(Request $request)
    {
        $user = new User();

        $user  ->setMatricule($request->get('matricule'))
               ->setNom($request->get('nom'))
               ->setPrenom($request->get('prenom'))
               ->setTel($request->get('tel'))
               ->setEmail($request->get('email'))
               ->setRoles($request->get('role'))
               ->setUsername($request->get('username'))
               ->setEnabled( true)
               
               ->setPlainPassword($request->get('password'))
               ;
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
     * @Route("/{id}", name="update_user_by_id",methods={"PUT"})
     */
    public function updateAction(Request $request,$id)
    {
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
        ->setEnabled($request->get('enabled'))
        ->setUsername($request->get('username'));
       
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

    

}
