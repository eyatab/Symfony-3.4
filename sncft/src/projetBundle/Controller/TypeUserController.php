<?php

namespace projetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use projetBundle\Entity\TypeUser;

/**
 * @Route("/api_v1/typesuser")
 */
class TypeUserController extends Controller
{
/**
     * @Route("", name="get_all_typesUser",methods={"GET"})
     */
    public function allAction(Request $request)
    {
        $typesUser = $this->get('doctrine.orm.entity_manager')->getRepository('projetBundle:TypeUser')->findAll();

        foreach ($typesUser as $typeUser) {
            $formatted[] = [
               'id' => $typeUser->getId(),
               'nom' =>$typeUser->getNom(),
            ];
        }
         if(!$formatted)
         {
             return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'data not found']], 404);
         }
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$formatted]]);
    }

    /**
     * @Route("/{id}", name="get_typeUser_by_id",methods={"GET"})
     */
    public function getByIdAction($id)
    {
        $repository = $this->getDoctrine()->getRepository(TypeUser::class);
        $typeUser=$repository->find($id);
        if (empty($typeUser)) {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'data not found']], 404);
        }
        $formatted = [
            'id' => $typeUser->getId(),
            'nom' => $typeUser->getNom(),
             
        ];
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$formatted]]);

    }
    /**
     * @Route("", name="add_typeUser_by_id",methods={"POST"})
     */
    public function createAction(Request $request)
    {
        $typeUser = new TypeUser();
        $typeUser
               ->setNom($request->get('nom'));
              
        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($typeUser);
        $em->flush();

        if(!$em)
        {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'ERROR']], 400);
        }
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$typeUser]]);

    }

    /**
     * @Route("/{id}", name="update_typeUser_by_id",methods={"PUT"})
     */
    public function updateAction(Request $request,$id)
    {
        $repository = $this->getDoctrine()->getRepository(TypeUser::class);
        $typeUser=$repository->find($id);
        if (empty($typeUser)) {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'data not found']], 404);
        }
        $typeUser->setNom($request->get('nom')) ;
        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($typeUser);
        $em->flush();
        if(!$em)
        {
            return new JsonResponse(['result' => ['success'=>'false','data'=>null,'message'=>'ERROR']], 400);
        }
        return new JsonResponse(['result' => ['success'=>'true','message'=>'success','data'=>$typeUser]]);

    }
  /**
     * @Route("/{id}", name="delete_typeUser",methods={"DELETE"})
     */
  
    public function DeleteAction(Request $request)
    { 
        $em = $this->get('doctrine.orm.entity_manager');

        $typeUser = $em->getRepository('projetBundle:TypeUser')
                    ->find($request->get('id'));
        /* @var $typeUser TypeUser */
        if ($typeUser) {
        $em->remove($typeUser);
        $em->flush();
        return new Response('It\'s probably been deleted');
    }
    else {
        return new Response('doesn\'t exist');
    }}

    


}
