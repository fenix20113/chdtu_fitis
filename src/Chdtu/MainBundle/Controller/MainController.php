<?php

namespace Chdtu\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('ChdtuMainBundle::layout.html.twig', array());
    }
}
