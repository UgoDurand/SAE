<?php

namespace App\Repository;

use App\Entity\TitleRatings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TitleRatings>
 *
 * @method TitleRatings|null find($id, $lockMode = null, $lockVersion = null)
 * @method TitleRatings|null findOneBy(array $criteria, array $orderBy = null)
 * @method TitleRatings[]    findAll()
 * @method TitleRatings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TitleRatingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TitleRatings::class);
    }

    public function add(TitleRatings $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TitleRatings $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
    * @return TitleRatings[] Returns an array of TitleRatings objects */
    public function findByExampleField($value): array
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
           ->getQuery()
            ->getResult()
        ;
    }

//    public function findOneBySomeField($value): ?TitleRatings
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
