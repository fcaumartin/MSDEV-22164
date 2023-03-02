<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PanierController extends AbstractController
{
    #[Route('/panier', name: 'app_panier')]
    public function index(SessionInterface $session): Response
    {
        $panier = $session->get("panier", []);


        return $this->render('panier/index.html.twig', [
            'panier' => $panier,
        ]);
    }

    #[Route('/add/{produit}', name: 'app_panier_add')]
    public function add(Produit $produit, SessionInterface $session): Response
    {
        $panier = $session->get("panier", []);

        $panier[] = $produit;

        $session->set("panier", $panier);

        return $this->redirect("/panier");
    }


    #[Route('/clear', name: 'app_panier_clear')]
    public function clear(SessionInterface $session): Response
    {
        $session->set("panier", []);

        return $this->redirect("/");
    }
}
