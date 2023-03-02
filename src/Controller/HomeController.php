<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Categorie;
use App\Entity\SousCategorie;
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

    #[Route('/categorie/{categorie}', name: 'app_categorie')]
    public function categorie(Categorie $categorie): Response
    {
                
        return $this->render('home/categorie.html.twig', [
            "categorie" => $categorie
        ]);
    }

    #[Route('/souscategorie/{sousCategorie}', name: 'app_souscategorie')]
    public function souscategorie(SousCategorie $sousCategorie): Response
    {
        
        return $this->render('home/produits.html.twig', [
            "sousCategorie" => $sousCategorie
        ]);
    }

    #[Route('/produit/{produit}', name: 'app_produit')]
    public function produit(Produit $produit): Response
    {
        
        return $this->render('home/produit.html.twig', [
            "produit" => $produit
        ]);
    }
}
