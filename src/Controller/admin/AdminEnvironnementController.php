<?php

namespace App\Controller\admin;

use App\Entity\Environnement;
use App\Repository\EnvironnementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;



class AdminEnvironnementController extends AbstractController{
    
    /**
 * @var VisiteRepository
 */
private $repository;
    
/**
 * 
 * @param EnvironnementRepository $repository
 */    
public function __construct(EnvironnementRepository $repository) {
    $this->repository = $repository;
}
/**
 * recupère tout les environement et les affiche
 * @return Response
 */
#[Route('/admin/environnements', name: 'admin.environnements')]
    public function index(): Response{
    $environnements = $this->repository->findAll();
    return $this->render("admin/admin.environnements.html.twig",[
        'environnements' => $environnements]); 
}
/**
 * supprime un environnement
 * @param type $id
 * @return Response
 */
#[Route('/admin/environnement/suppr/{id}', name: 'admin.environnement.suppr')]
public function suppr( $id): Response{
    $environnement = $this->repository->find($id);
    $this->repository->remove($environnement);
    return $this->redirectToRoute('admin.environnements');
}
#[Route('/admin/environnement/ajout', name: 'admin.environnement.ajout')]
    public function ajout(Request $request) : Response{
        $nomEnvironnement = $request->get("nom");
        $environnement = new Environnement();
        $environnement->setNom($nomEnvironnement);
        $this->repository->add($environnement);
        return $this->redirectToRoute('admin.environnements');
    }
    }
