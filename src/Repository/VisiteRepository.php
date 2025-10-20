<?php

namespace App\Repository;

use App\Entity\Visite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Visite>
 */
class VisiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Visite::class);
    }
    /**
     * 
     * @param type $champ
     * @param type $ordre
     * @return visite[]
     */
    public function findAllOrderBy($champ,$ordre):array
    {
        return $this->createQueryBuilder('v')
                ->orderBy('v.'.$champ,$ordre)
                ->getQuery()
                ->getResult();
    }
}
