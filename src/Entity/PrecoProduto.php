<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PrecoProdutoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('preco_produtos')]
#[ORM\Entity(repositoryClass: PrecoProdutoRepository::class)]
#[ApiResource]
class PrecoProduto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produto $produtos = null;

    #[ORM\Column(length: 255)]
    private ?string $preco = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProdutos(): ?Produto
    {
        return $this->produtos;
    }

    public function setProdutos(?Produto $produtos): static
    {
        $this->produtos = $produtos;

        return $this;
    }

    public function getPreco(): ?string
    {
        return $this->preco;
    }

    public function setPreco(string $preco): static
    {
        $this->preco = $preco;

        return $this;
    }
}
