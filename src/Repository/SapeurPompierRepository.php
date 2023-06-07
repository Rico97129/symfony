<?php

namespace App\Repository;

use App\Entity\SapeurPompier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SapeurPompier>
 *
 * @method SapeurPompier|null find($id, $lockMode = null, $lockVersion = null)
 * @method SapeurPompier|null findOneBy(array $criteria, array $orderBy = null)
 * @method SapeurPompier[]    findAll()
 * @method SapeurPompier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SapeurPompierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SapeurPompier::class);
    }

    public function save(SapeurPompier $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SapeurPompier $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SapeurPompier[] Returns an array of SapeurPompier objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SapeurPompier
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
