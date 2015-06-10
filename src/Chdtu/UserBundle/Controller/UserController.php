<?php

namespace Chdtu\UserBundle\Controller;

use Chdtu\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @return Response
     */
    public function userListAction()
    {
        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();

        return $this->render(
            'ChdtuUserBundle:Users:user_list.html.twig',
            [
                'users' => $users,
            ]
        );
    }

    /**
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function createAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm($this->get('chdtu.form.type.user.edit'), $user);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $userManager = $this->get('fos_user.user_manager');

            $user->setConfirmationToken(null);
            $userManager->updateUser($user);
            $this->get('session')->getFlashBag()->add('notice', 'The item has been created successfully!');

            return $this->redirect($this->generateUrl('_user_list'));
        }

        return $this->render(
            'ChdtuUserBundle:Users:user_edit.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @param Request $request
     * @param $user_id
     * @return RedirectResponse|Response
     */
    public function editAction(Request $request, $user_id)
    {
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserBy(['id' => $user_id]);
        $form = $this->createForm($this->get('chdtu.form.type.user.edit'), $user);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $userManager->updateUser($user);
            $this->get('session')->getFlashBag()->add('notice', 'The item has been created successfully!');

            return $this->redirect($this->generateUrl('_user_list'));
        }

        return $this->render(
            'ChdtuUserBundle:Users:user_edit.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }


    /**
     * @param $user_id
     * @return RedirectResponse
     * @throws NotFoundHttpException
     */
    public function removeAction($user_id)
    {
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserBy(['id' => $user_id]);
        if (null === $user) {
            throw new NotFoundHttpException(sprintf('The user with "id" does not exist for value "%s"', $user_id));
        }
        $userManager->deleteUser($user);
        return $this->redirect($this->generateUrl('_user_list'));
    }
}
