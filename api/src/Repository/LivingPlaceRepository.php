<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\LivingPlace;
use App\Exception\LivingPlace\LivingPlaceNotFoundException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

/**
 *
 */
class LivingPlaceRepository extends BaseRepository
{
    protected static function entityClass(): string
    {
        return LivingPlace::class;
    }

    /**
     * @param string $name
     * @return LivingPlace
     */
    public function findOneByNameOrFail(string $name): LivingPlace
    {
        if(null === $livingPlace = $this->objectRepository->findOneBy(['name' => $name])){
            throw LivingPlaceNotFoundException::fromName($name);
        }

        return $livingPlace;
    }

    /**
     * @param LivingPlace $livingPlace
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(LivingPlace $livingPlace)
    {
        $this->saveEntity($livingPlace);
    }

    /**
     * @param LivingPlace $livingPlace
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(LivingPlace $livingPlace): void
    {
        $this->removeEntity($livingPlace);
    }
}