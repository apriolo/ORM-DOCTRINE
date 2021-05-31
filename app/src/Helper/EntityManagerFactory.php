<?php


namespace Alura\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    /**
     * @return EntityManagerInterface
     * @throws ORMException
     */
    public function getEntityManager(): EntityManagerInterface
    {
        $rootDir = __DIR__ . '/../..';
        // Seto que as configs vão ser por annotations dentro da pasta src
        $config = Setup::createAnnotationMetadataConfiguration(
            [$rootDir . '/src'],
            // Modo de desenvolvimento, retorna erros mais detalhados
            true
        );
        // drivers de conexao
        $connection = [
            'driver' => 'pdo_mysql',
            'host' => 'orm_mysql_1',
            'dbname' => 'cursoDoctrine',
            'user' => 'root',
            'password' => '1234'
        ];
        // crio a entity manager
        return EntityManager::create($connection, $config);
    }
}