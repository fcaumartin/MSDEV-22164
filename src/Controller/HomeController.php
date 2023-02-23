<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use App\Repository\CategorieRepository;
use App\Repository\SousCategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CategorieRepository $repo): Response
    {
        $categories = $repo->findAll();

        return $this->render('home/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route('/categorie/{id}', name: 'app_categorie')]
    public function categorie(SousCategorieRepository $repo, $id): Response
    {
        
        $souscategories = $repo->findBy([
            "categorie" => $id
        ]);

        return $this->render('home/categorie.html.twig', [
            "souscategories" => $souscategories
        ]);
    }

    #[Route('/souscategorie/{id}', name: 'app_souscategorie')]
    public function souscategorie(ProduitRepository $repo, $id): Response
    {
        
        $produits = $repo->findBy([
            "sousCategorie" => $id
        ]);

        return $this->render('home/produits.html.twig', [
            "produits" => $produits
        ]);
    }
}
