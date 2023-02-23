<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use App\Entity\Categorie;
use App\Entity\SousCategorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $c1 = new Categorie();
        $c1->setNom("Guitares");
        $manager->persist($c1);

        $c2 = new Categorie();
        $c2->setNom("Percussions");
        $manager->persist($c2);

        $c3 = new Categorie();
        $c3->setNom("Sono");
        $manager->persist($c3);

        $c4 = new Categorie();
        $c4->setNom("DJ");
        $manager->persist($c4);

        $sc1 = new SousCategorie();
        $sc1->setNom("Guitares Electriques");
        $sc1->setCategorie($c1);
        $manager->persist($sc1);

        $sc2 = new SousCategorie();
        $sc2->setNom("Guitares 222");
        $sc2->setCategorie($c1);
        $manager->persist($sc2);

        $sc3 = new SousCategorie();
        $sc3->setNom("Guitares 333");
        $sc3->setCategorie($c1);
        $manager->persist($sc3);

        $sc4 = new SousCategorie();
        $sc4->setNom("Guitares 444");
        $sc4->setCategorie($c1);
        $manager->persist($sc4);


        $p1 = new Produit();
        $p1->setNom("Guitare qui joue vite");
        $p1->setPrix(12.56);
        $p1->setSousCategorie($sc1);
        $manager->persist($p1);

        $p2 = new Produit();
        $p2->setNom("Guitare qui joue fort");
        $p2->setPrix(752.14);
        $p2->setSousCategorie($sc1);
        $manager->persist($p2);

        $p3 = new Produit();
        $p3->setNom("Guitare qui joue encore plus fort");
        $p3->setPrix(7552.14);
        $p3->setSousCategorie($sc1);
        $p3->setDescription("Get Involved

        If you want to help contribute to Ubuntu, then you’ve come to the right place. Keep reading to learn how.
        
        You have just taken your first step toward getting involved. Before you get started, we ask that you please observe the Ubuntu Code of Conduct. It’s not very long and it will help you get started.
        
        Once that’s done, check out the Ubuntu Community Hub.
        
        Teams
        
        The Teams page contains a listing of the various Community Teams, their responsibilities, links to their Wiki Home Pages and leaders, communication tools, and a quick reference to let you know whether and when they hold meetings.
        
        Most Teams’ Wiki Home Pages provide information about who they are, what they do, when their meetings are, and how to contact them. Using these pages, teammates are able to communicate and coordinate projects.
        
        LoCoTeams
        
        For participating on the Country area team contributing to a Local Development of Localization and Internationalization and promoting use of Ubuntu.
        
        Governance and Membership
        
        Like most communities, we have our rules and governing body.
        
        Anyone can join and participate in most, if not all, of our Teams and Projects. But if you want an “@ubuntu.com” e-mail address, it has to be earned. Find out how in our Membership documentation. ");
        $manager->persist($p3);

        $p4 = new Produit();
        $p4->setNom("Guitare qui joue fort");
        $p4->setPrix(752.14);
        $p4->setSousCategorie($sc1);
        $p4->setImage("guitare4.png");
        $manager->persist($p4);

        $manager->flush();
    }
}
