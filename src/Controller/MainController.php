<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/home', name: 'main_home')]
    public function home(): Response
    {
        return $this->render('main/home.html.twig', [

        ]);
    }
    #[Route('/DBZ', name: 'main_DBZ')]
    public function DBZ(): Response
    {
        return $this->render('main/DBZ.html.twig', [

        ]);
    }
    #[Route('/about-us', name: 'main_about_us')]
    public function aboutus(): Response
    {
        return $this->render('main/about_us.html.twig', [

        ]);
    }
}
