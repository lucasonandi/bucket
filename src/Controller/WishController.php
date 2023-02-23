<?php

namespace App\Controller;

use App\Repository\WishRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route ('wish', name: 'wish_')]
class WishController extends AbstractController
{

#[
Route('/list', name: 'list')]
    public function list(WishRepository $wishRepository) : Response
    {

    $wishes = $wishRepository->orderByDate();
    dump($wishes);
        //TODO recuperer la liste des wish en BDD
        return $this->render('wish/list.html.twig', ['wishes' => $wishes]);
    }
    #[Route('/{id}', name: 'detail', requirements: ['id' => '\d+'])]
    public function show(int $id, WishRepository $wishRepository): Response
    {
        $wish = $wishRepository->find($id);
        dump($id);

        if (!$wish){
            //lance une error 404 si la serie n'existe pas
            throw $this->createNotFoundException("Oops ! wish not found !");
        }
        dump($id);

        //TODO recupereration des infos de la serie en BDD
        return $this->render('wish/detail.html.twig', ['wish'=>$wish]);
    }
}
