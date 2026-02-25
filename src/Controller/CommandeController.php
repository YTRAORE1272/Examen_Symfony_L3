<?php

namespace App\Controller;

use App\Entity\Achat;
use App\Entity\Commande;
use App\Repository\CommandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommandeController extends AbstractController
{
    #[Route('/', name: 'homepage', methods: ['GET'])]
    public function index(): Response
    {
        return $this->redirectToRoute('commande_list');
    }

    #[Route('/commandes', name: 'commande_list', methods: ['GET'])]
    public function list(CommandeRepository $commandeRepository): Response
    {
        $commandes = $commandeRepository->findAll();

        return $this->render('commande/list.html.twig', [
            'commandes' => $commandes,
        ]);
    }

    #[Route('/commande/nouvelle', name: 'commande_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $commande = new Commande();
        $commande->addAchat(new Achat());

        $form = $this->createForm(\App\Form\CommandeType::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($commande->getAchats()->isEmpty()) {
                $this->addFlash('error', 'Une commande doit contenir au moins un achat.');
                return $this->redirectToRoute('commande_new');
            }

            $commande->calculerMontantTotal();
            $entityManager->persist($commande);
            $entityManager->flush();

            $this->addFlash('success', 'Commande créée avec succès !');
            return $this->redirectToRoute('commande_list');
        }

        return $this->render('commande/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
