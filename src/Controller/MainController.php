<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
class MainController extends AbstractController 
{
    #[Route('/')]
    
    public function homepage(StarshipRepository $starshipRepository): Response
    {
        $ships = $starshipRepository->findAll();
        $starship =  $ships[array_rand($ships)];
        //$starshipCount = count($ships);
        //return new Response('<strong>Hello Symfony</strong>');
        return $this->render('main/homepage.html.twig', ['numberOfStarships' => $ships, 'starship'=> $starship]);
    }
}