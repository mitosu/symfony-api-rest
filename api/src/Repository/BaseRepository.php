<?php

declare(strict_types=1);

namespace App\Repository;


use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\Mapping\MappingException;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ObjectRepository;

abstract class BaseRepository
{
    private ManagerRegistry $managerRegistry;
    protected Connection $connection;
    protected ObjectRepository $objectRepository;

    public function __construct(ManagerRegistry $managerRegistry, Connection $connection)
    {
        $this->managerRegistry = $managerRegistry;
        $this->connection = $connection;
        $this->objectRepository = $this->getEntityManager()->getRepository($this->entityClass());
    }

    /**
     * Get name class for all
     * classes to Inherit for
     * this class
     * @return string
     */
    abstract protected static function entityClass(): string;

    /**
     * @throws ORMException
     */
    public function persistEntity(object $entity)
    {
        $this->getEntityManager()->persist($entity);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws MappingException
     */
    public function flushData(): void
    {
        $this->getEntityManager()->flush();
        $this->getEntityManager()->clear();
    }

    /**
     * @param object $entity
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function saveEntity(object $entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    /**
     * @param object $entity
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function removeEntity(object $entity)
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    /**
     * @param string $query
     * @param array $params
     * @return array
     * @throws Exception
     */
    protected function executeFetchQuery(string $query, array $params = []): array
    {
        return $this->connection->executeQuery($query, $params)->fetchAllAssociative();
    }

    /**
     * @param string $query
     * @param array $params
     * @throws Exception
     */
    protected function executeQuery(string $query, array $params = []): void
    {
        $this->connection->executeQuery($query, $params)->fetchAllAssociative();
    }

    /**
     * @return ObjectManager|EntityManager
    */
    private function getEntityManager()
    {
        $entityManager = $this->managerRegistry->getManager();
        if($entityManager->isOpen()){
            return $entityManager;
        }

        return $this->managerRegistry->resetManager();
    }
}