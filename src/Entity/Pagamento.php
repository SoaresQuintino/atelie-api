<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PagamentoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('pagamentos')]
#[ORM\Entity(repositoryClass: PagamentoRepository::class)]
#[ApiResource]
class Pagamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?MetodoDePagamento $metodo_pagamento = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pedido $pedido = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $data = null;

    #[ORM\Column(length: 255)]
    private ?string $parcelamento = null;

    #[ORM\Column(length: 255)]
    private ?string $valor = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMetodoPagamento(): ?MetodoDePagamento
    {
        return $this->metodo_pagamento;
    }

    public function setMetodoPagamento(?MetodoDePagamento $metodo_pagamento): static
    {
        $this->metodo_pagamento = $metodo_pagamento;

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

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): static
    {
        $this->data = $data;

        return $this;
    }

    public function getParcelamento(): ?string
    {
        return $this->parcelamento;
    }

    public function setParcelamento(string $parcelamento): static
    {
        $this->parcelamento = $parcelamento;

        return $this;
    }

    public function getValor(): ?string
    {
        return $this->valor;
    }

    public function setValor(string $valor): static
    {
        $this->valor = $valor;

        return $this;
    }
}
