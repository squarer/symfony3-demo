<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * FollowRepository
 */
class FollowRepository extends EntityRepository
{
    /**
     * get followed list
     */
    public function getFollowed($followerId)
    {
        $qb = $this->createQueryBuilder('f')
            ->where('f.followerId = :followerId')
            ->andWhere('f.isValid = 1')
            ->setParameter('followerId', $followerId);

        $ret = [];
        foreach ($qb->getQuery()->getResult() as $obj) {
            $follow = $obj->toArray();
            unset($follow['follower_id']);
            $ret[] = $follow;
        }

        return $ret;
    }

    /**
     * get fans list
     */
    public function getFans($followedId)
    {
        $qb = $this->createQueryBuilder('f')
            ->where('f.followedId = :followedId')
            ->andWhere('f.isValid = 1')
            ->setParameter('followedId', $followedId);

        $ret = [];
        foreach ($qb->getQuery()->getResult() as $obj) {
            $follow = $obj->toArray();
            unset($follow['followed_id']);
            $ret[] = $follow;
        }

        return $ret;
    }

    /**
     * get followed count
     */
    public function countFollowed($followerId)
    {
        $qb = $this->createQueryBuilder('f')
            ->select('count(f.followedId)')
            ->where('f.followerId = :followerId')
            ->andWhere('f.isValid = 1')
            ->setParameter('followerId', $followerId);

        return $qb->getQuery()->getSingleScalarResult();
    }

    /**
     * get fans count
     */
    public function countFans($followedId)
    {
        $qb = $this->createQueryBuilder('f')
            ->select('count(f.followedId)')
            ->where('f.followedId = :followedId')
            ->andWhere('f.isValid = 1')
            ->setParameter('followedId', $followedId);

        return $qb->getQuery()->getSingleScalarResult();
    }
}
