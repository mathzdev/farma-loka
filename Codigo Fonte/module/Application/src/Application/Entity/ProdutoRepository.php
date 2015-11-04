<?php
/**
 * Created by PhpStorm.
 * User: matheuslucio
 * Date: 24/10/15
 * Time: 19:50
 */

namespace Application\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Class ProdutoRepository
 * @package Application\Entity
 */
class ProdutoRepository extends EntityRepository
{
    /**
     * Retorna a quantidade de produtos por fornecedores que temos
     *
     * @return array
     */
    public function produtosFornecedores()
    {
        $query = $this->getEntityManager()->createQuery(
            'SELECT COUNT(p.fornecedorProduto), f.nomeFornecedor FROM Application\Entity\Produto p, Application\Entity\Fornecedor f WHERE p.fornecedorProduto = f.idFornecedor GROUP BY p.fornecedorProduto'
        );

        return $query->getResult();
    }
} 