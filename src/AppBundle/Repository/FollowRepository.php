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
    public function getFollowedList($followerId)
    {
        $qb = $this->createQueryBuilder('f')
            ->where('f.followerId = :followerId')
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
    public function getFansList($followedId)
    {
        $qb = $this->createQueryBuilder('f')
            ->where('f.followedId = :followedId')
            ->setParameter('followedId', $followedId);

        $ret = [];
        foreach ($qb->getQuery()->getResult() as $obj) {
            $follow = $obj->toArray();
            unset($follow['followed_id']);
            $ret[] = $follow;
        }

        return $ret;
    }
}
