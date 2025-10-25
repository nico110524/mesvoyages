<?php
namespace App\Controller\admin;

use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AdminVoyagesController extends AbstractController {
 /**
 * @var VisiteRepository
 */
private $repository;
    
/**
 * 
 * @param VisiteRepository $repository
 */    
public function __construct(VisiteRepository $repository) {
    $this->repository = $repository;
}
/**
 * 
 * @return Response
 */
#[Route('/admin', name: 'admin.voyages')]
    public function index(): Response{
    $visites = $this->repository->findAllOrderBy('datecreation','DESC');
    return $this->render("admin/admin.voyages.html.twig",[
        'visites' => $visites]);     
}
#[Route('/admin/suppr/{id}', name: 'admin.voyage.suppr')]
public function suppr( $id): Response{
    $visite = $this->repository->find($id);
    $this->repository->remove($visite);
    return $this->redirectToRoute('admin.voyages');
}
    }