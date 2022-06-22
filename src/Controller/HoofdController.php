<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HoofdController extends AbstractController
{
    /**
     * @Route("/", name="app_hoofd")
     */
    public function index(): Response
    {
        return $this->render('hoofd/index.html.twig', [
            'controller_name' => 'HoofdController',
        ]);
    }
}
