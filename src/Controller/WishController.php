<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route ('wish', name: 'wish_')]
class WishController extends AbstractController
{

#[
Route('/list', name: 'list')]
    public function list(): Response
    {

        //TODO recuperer la liste des series en BDD
        return $this->render('serie/list.html.twig');
    }
    #[Route('/{id}', name: 'detail', requirements: ['id' => '\d+'])]
    public function show(int $id): Response
    {
        dump($id);

        //TODO recupereration des infos de la serie en BDD
        return $this->render('serie/detail.html.twig');
    }
}
