<?php

namespace App\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\AppBundle\Form\UsersType;
use App\AppBundle\Entity\Users;
use App\AppBundle\Entity\UsersRepository;

class DefaultController extends Controller
{

    public function indexAction($name)
    {
        return $this->render('AppBundle:Default:index.html.twig', array('name' => $name));
    }

    public function usersAction($in, Request $request)
    {
        $orderBy = $request->get('field');

        if ($orderBy === null) {
            $orderBy = 'id';
        }

        $em = $this->getDoctrine()->getManager();
        if ($in) {
            $users = $em->getRepository('AppBundle:Users')->getUsersIn();
        } else {
            $users = $em->getRepository('AppBundle:Users')->getUsersOut();
        }

        if (!$users) {
            echo json_encode(
                    array('users' =>
                        array()
                    )
            );
            exit;
//            throw $this->createNotFoundException(
//                    'No users found'
//            );
        }

        $aUsers = array();
        foreach ($users as $user) {
            array_push($aUsers, array(
                'id' => $user->getId(),
                'username' => $user->getUsername(),
                'hdv' => $user->getHdv(),
                'firstname' => $user->getFirstname(),
                'age' => $user->getAge(),
                'city' => $user->getCity(),
                'link' => $user->getLink(),
                'description' => $user->getDescription(),
                'state' => $user->getState(),
                'leaveReason' => $user->getLeaveReason(),
                'dateArrived' => $user->getDateArrived(),
                'leaveDate' => $user->getLeaveDate(),
                    )
            );
        }

        echo json_encode(
                array('users' =>
                    $aUsers
                )
        );
        exit;
    }

    /**
     * Update an user
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function saveUserAction(Request $request)
    {

        if ($request->getMethod() == 'POST') {
            $params = json_decode($request->getContent(), true);
            $updateUser = $params['user'];

//        exit;
            $em = $this->getDoctrine()->getManager();

            // get user
            if ($updateUser['id'] !== null) {
                $user = $this->getDoctrine()
                        ->getRepository('AppBundle:Users')
                        ->find($updateUser['id']);
            } else {
                $user = new Users();
            }

            $user->setUsername($updateUser['username']);
            $user->setHdv($updateUser['hdv']);
            $user->setAge($updateUser['age']);
            $user->setCity($updateUser['city']);
            $user->setDateArrived(new \DateTime($updateUser['dateArrived']['date']));
            $user->setDescription($updateUser['description']);
            $user->setFirstname($updateUser['firstname']);
            $user->setLeaveReason($updateUser['leaveReason']);
            $user->setLink($updateUser['link']);
            $user->setState($updateUser['state']);
            
            if (isset($updateUser['leaveDate'])) {
                $user->setLeaveDate(new \DateTime($updateUser['leaveDate']['date']));
            }

//            print_r($user);
//$form = $this->get('form.factory')->create(new UsersType, $users);
//            $users = new Users();
//            $formBuilder = $this->get('form.factory')->createBuilder('form', $users);
//            $formBuilder->add('username')
//                    ->add('firstname')
//                    ->add('age')
//                    ->add('city')
//                    ->add('link')
//                    ->add('description')
//                    ->add('state')
//                    ->add('leaveReason')
//                    ->add('dateArrived');
//            $form = $formBuilder->getForm();
//            print_r($params['user']);exit;
//$form->setData($params['user']);
//$form->setData(array('username'=>'john'));
//print_r($form->get('username'));
////
            $em->persist($user);
////
            $em->flush();
//
        }
        exit;
    }

    /**
     * Create an user
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function addUserAction(Request $request)
    {

        if ($request->getMethod() == 'POST') {
            $params = json_decode($request->getContent(), true);
            $newUser = $params['user'];

            $em = $this->getDoctrine()->getManager();

            // get user
            $user = new Users();


            $user->setUsername($newUser['username']);
            $user->setAge($newUser['age']);
            $user->setCity($newUser['city']);
            $user->setDateArrived(new \DateTime($newUser['dateArrived']['date']));
            $user->setDescription($newUser['description']);
            $user->setFirstname($newUser['firstname']);
            $user->setLeaveReason($newUser['leaveReason']);
            $user->setLink($newUser['link']);
            $user->setState($newUser['state']);

//            $em->persist($users);

            $em->flush($user);
        }
    }

}
