<?php

namespace App\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\AppBundle\Entity\Gdc;
use App\AppBundle\Entity\WarAttack;

//use App\AppBundle\Form\UsersType;
//use App\AppBundle\Entity\Users;
//use App\AppBundle\Entity\GdcRepository;

class GdcController extends Controller
{

    public function indexAction()
    {
        $listGdc = $this->getDoctrine()
                ->getRepository('AppBundle:Gdc')
                ->findAll();

        $aListGdc = array();
        foreach ($listGdc as $gdc) {
            array_push($aListGdc, array(
                'id' => $gdc->getId(),
                'enemy_team' => $gdc->getEnemyTeam(),
                'stars' => $gdc->getStars(),
                'enemy_stars' => $gdc->getEnemyStars(),
                'date' => $gdc->getDate()
                    )
            );
        }

        echo json_encode(
                array('listGdc' =>
                    $aListGdc
                )
        );

        exit;
    }

    public function saveAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $params = json_decode($request->getContent(), true);
            $updateGdc = $params['gdc'];

            $em = $this->getDoctrine()->getManager();

//            // get gdc
            if (isset($updateGdc['id'])) {
                $gdc = $this->getDoctrine()
                        ->getRepository('AppBundle:Gdc')
                        ->find($updateGdc['id']);
            } else {
                $gdc = new Gdc();
            }
//
            $gdc->setEnemyTeam($updateGdc['enemy_team']);
            $gdc->setStars($updateGdc['stars']);
            $gdc->setEnemyStars($updateGdc['enemy_stars']);
            $gdc->setDate(new \DateTime($updateGdc['date']['date']));

            $em->persist($gdc);

            $em->flush();

            echo json_encode(array('id_gdc' => $gdc->getId()));
        }

        exit;
    }

    public function warAction($id, Request $request)
    {
        $war = $this->getDoctrine()
                ->getRepository('AppBundle:WarAttack')
                ->findWar($id);

        $aWar = array();
        foreach ($war as $user) {
            array_push($aWar, array(
                'id' => $user->getId(),
//                'id_gdc' => $user->getIdGdc()->get,
                'id_user' => $user->getIdUser()->getId(),
                'username' => $user->getIdUser()->getUsername(),
                'first_attack' => $user->getFirstAttack(),
                'second_attack' => $user->getSecondAttack(),
                'strategy' => $user->getStrategy(),
                'cdc_full' => $user->getCdcFull(),
            ));
        }
        echo json_encode(
                array('users' =>
                    $aWar,
                )
        );
        exit;
    }

    /**
     * Get info war
     * @param type $id
     */
    public function warInfoAction($id)
    {
        $infoWar = $this->getDoctrine()
                ->getRepository('AppBundle:Gdc')
                ->find($id);

        $aInfoWar = array(
            'id' => $infoWar->getId(),
            'enemyTeam' => $infoWar->getEnemyTeam(),
            'date' => $infoWar->getDate(),
        );

        echo json_encode(
                array('infos' =>
                    $aInfoWar,
                )
        );
        exit;
    }

    public function saveWarAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $params = json_decode($request->getContent(), true);

            $updateWar = $params['war'];

            $em = $this->getDoctrine()->getManager();

//            // get gdc
            if (isset($updateWar['id'])) {
                $war = $this->getDoctrine()
                        ->getRepository('AppBundle:WarAttack')
                        ->find($updateWar['id']);
            } else {
                $war = new WarAttack();
            }

            $user = $this->getDoctrine()
                    ->getRepository('AppBundle:Users')
                    ->find($updateWar['id_user']);

            $gdc = $this->getDoctrine()
                    ->getRepository('AppBundle:Gdc')
                    ->find($params['id_gdc']);

            $war->setIdGdc($gdc);
            $war->setCdcFull($updateWar['cdc_full']);
            $war->setFirstAttack($updateWar['first_attack']);
            $war->setSecondAttack($updateWar['second_attack']);
            $war->setIdUser($user);
            $war->setStrategy($updateWar['strategy']);

            $em->persist($war);

            $em->flush();
        }
        exit;
    }

}
