<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\ItemPedidoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('itens_pedidos')]
#[ORM\Entity(repositoryClass: ItemPedidoRepository::class)]

class ItemPedido
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produto $produto = null;

    #[ORM\Column(length: 255)]
    private ?string $precoUnitario = null;

    #[ORM\Column(length: 255)]
    private ?string $quantidade = null;

    #[ORM\ManyToOne(inversedBy: 'itensPedido')]
    #[ORM\JoinColumn(nullable: false)]
    #[ApiProperty(readable: false, writable: false)]
    private ?Pedido $pedido = null;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getProduto(): ?Produto
    {
        return $this->produto;
    }

    public function setProduto(?Produto $produto): static
    {
        $this->produto = $produto;

        return $this;
    }

    public function getPrecoUnitario(): ?string
    {
        return $this->precoUnitario;
    }

    public function setPrecoUnitario(string $precoUnitario): static
    {
        $this->precoUnitario = $precoUnitario;

        return $this;
    }

    public function getQuantidade(): ?string
    {
        return $this->quantidade;
    }

    public function setQuantidade(string $quantidade): static
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    public function getPedido(): ?Pedido
    {
        return $this->pedido;
    }

    public function setPedido(?Pedido $pedido): static
    {
        $this->pedido = $pedido;

        return $this;
    }
}
