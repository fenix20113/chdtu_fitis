<?php

namespace Chdtu\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function userListAction()
    {
        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();
        return $this->render('ChdtuUserBundle:Users:user_list.html.twig', [
            'users' => $users,
        ]);
    }
}
