<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categorieElectronique = new Categorie();
        $categorieElectronique->setNom('Électronique');
        $manager->persist($categorieElectronique);

        $categorieVetements = new Categorie();
        $categorieVetements->setNom('Vêtements');
        $manager->persist($categorieVetements);

        $categorieAlimentation = new Categorie();
        $categorieAlimentation->setNom('Alimentation');
        $manager->persist($categorieAlimentation);

        $categorieLivres = new Categorie();
        $categorieLivres->setNom('Livres');
        $manager->persist($categorieLivres);

        $produit1 = new Produit();
        $produit1->setNom('Smartphone Samsung Galaxy');
        $produit1->setPrix('200000');
        $produit1->setCategorie($categorieElectronique);
        $manager->persist($produit1);

        $produit2 = new Produit();
        $produit2->setNom('Ordinateur Portable Dell');
        $produit2->setPrix('400000');
        $produit2->setCategorie($categorieElectronique);
        $manager->persist($produit2);

        $produit3 = new Produit();
        $produit3->setNom('Écouteurs Bluetooth');
        $produit3->setPrix('15000');
        $produit3->setCategorie($categorieElectronique);
        $manager->persist($produit3);

        $produit4 = new Produit();
        $produit4->setNom('T-shirt Coton Bio');
        $produit4->setPrix('18000');
        $produit4->setCategorie($categorieVetements);
        $manager->persist($produit4);

        $produit5 = new Produit();
        $produit5->setNom('Jean Slim Bleu');
        $produit5->setPrix('6000');
        $produit5->setCategorie($categorieVetements);
        $manager->persist($produit5);

        $produit6 = new Produit();
        $produit6->setNom('Veste en Cuir');
        $produit6->setPrix('50000');
        $produit6->setCategorie($categorieVetements);
        $manager->persist($produit6);

        $produit7 = new Produit();
        $produit7->setNom('Café Arabica 1kg');
        $produit7->setPrix('2500.50');
        $produit7->setCategorie($categorieAlimentation);
        $manager->persist($produit7);

        $produit8 = new Produit();
        $produit8->setNom('Chocolat Noir 70%');
        $produit8->setPrix('3000');
        $produit8->setCategorie($categorieAlimentation);
        $manager->persist($produit8);

        $produit9 = new Produit();
        $produit9->setNom('Symfony 6 - Le Guide Complet');
        $produit9->setPrix('12000');
        $produit9->setCategorie($categorieLivres);
        $manager->persist($produit9);

        $produit10 = new Produit();
        $produit10->setNom('PHP 8 - Les Nouveautés');
        $produit10->setPrix('10000');
        $produit10->setCategorie($categorieLivres);
        $manager->persist($produit10);

        $manager->flush();
    }
}
