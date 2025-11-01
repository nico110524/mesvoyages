<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\VisiteRepository;



class AccueilController extends AbstractController{
    
    private $repository;
    
    public function __construct(VisiteRepository $repository) {
        $this->repository = $repository;
        
    }

    #[Route('/', name: 'accueil')]
    public function index(): Response{
            $visites = $this->repository->findTwoLastValue(2);
        return $this->render("pages/accueil.html.twig",[
            'visites' => $visites]);
    }
        
    }

