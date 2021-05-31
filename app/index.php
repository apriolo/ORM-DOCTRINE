<?php

use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/vendor/autoload.php';

 $entityManagerFactory = new EntityManagerFactory();
 $entityManager = $entityManagerFactory->getEntityManager();

 print_r($entityManager->getConnection());
