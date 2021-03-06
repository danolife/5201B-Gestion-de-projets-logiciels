<?php

namespace LibraryBundle\Entity;

/**
 * AuthorRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AuthorRepository extends \Doctrine\ORM\EntityRepository
{
    public function findLike($text)
    {
        $queryBuilder = $this->createQueryBuilder('author')
            ->where("author.name LIKE :text")
            ->setParameter('text','%'.$text.'%')
        ;



        return $queryBuilder->getQuery()->getResult();
    }
}
