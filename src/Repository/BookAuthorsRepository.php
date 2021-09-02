<?php

namespace App\Repository;

use App\Entity\BookAuthors;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BookAuthors|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookAuthors|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookAuthors[]    findAll()
 * @method BookAuthors[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookAuthorsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookAuthors::class);
    }
}
