<?php

namespace App\Controller;

use App\Entity\Wish;
use App\Form\WishType;
use App\Repository\WishRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    #[Route('/add', name: 'add')]
    public function add(WishRepository $wishRepository, Request $request,): Response
    {

        $wish = new Wish();
        //creation de'une instance de form lie a une instance de serie

        $wishForm = $this->createForm(WishType::class, $wish);

        //metode qui extrait les elements du formulaire de la requete
        $wishForm->handleRequest($request);


        if ($wishForm->isSubmitted() && $wishForm->isValid()) {
            $wish->setIsPublished(true);
            //sauvegarde en BDD la nouvelle serie
            $wishRepository->save($wish, true);

            $this->addFlash("success", "Idea successfully added!");

            //redirige vers la page de detail de la serie
            return $this->redirectToRoute('wish_detail', ['id' => $wish->getId()]);
        }
        //TODO recuperer la liste des series en BDD
        return $this->render('wish/add.html.twig', [
            'wishForm' => $wishForm->createView()
        ]);
    }
}
