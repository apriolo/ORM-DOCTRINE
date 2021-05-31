<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

// Instancio uma fabrica do entity manager
$entityManagerFactory = new EntityManagerFactory();
// pego o enetity manager para manipular os dados do banco
$entityManager = $entityManagerFactory->getEntityManager();

// Pego o repositorio enviando a class como parametro
//$alunoRepository = $entityManager->getRepository(Aluno::class);

///**
// * @var Aluno[] $alunoList
// */
//$alunoList = $alunoRepository->findAll();

// Buscar com queries do DQL
$dql = "SELECT aluno FROM Alura\\Doctrine\\Entity\\Aluno aluno WHERE aluno.id = 1 OR aluno.nome = 'Novo Aluno'";
$query = $entityManager->createQuery($dql);
$alunoList = $query->getResult();

foreach ($alunoList as $aluno) {
    // get Telefones retorna uma lista de telefones do doctrine
    // funcao map para percorres os resltados do getTelefones
    $telefones = $aluno->getTelefones()->map(
        // uma funcao para retornar o numero em string de cada telefone
        function (Telefone $telefone) {
            return $telefone->getNumero();
        }
    )->toArray();// To array para criar um array de strings

    echo "ID:{$aluno->getId()}<br/>Nome: {$aluno->getNome()}<br/>";
    echo "Telefones:". implode(',', $telefones) . "<br/><br/>";
}

/**
 * @var Aluno $oneResult
 */
//$oneResult = $alunoRepository->find(3);
//echo "Find by ID<br/>ID:{$oneResult->getId()} - Nome:{$oneResult->getNome()}";

/**
 * @var Aluno $findByName
 */
//Find one bt retorna 1 resultado, o findBy uma lista filtrada
//$findByName = $alunoRepository->findOneBy([
//    'nome' => 'Anotther person'
//]);
//echo "Find by Name<br/>ID:{$findByName->getId()} - Nome:{$findByName->getNome()}";
