<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PedidoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PedidoRepository::class)]
#[ApiResource]
#[ORM\Table('pedidos')]
class Pedido
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cliente $cliente = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?MetodoDePagamento $metodoPagamento = null;

    #[ORM\Column(length: 255)]
    private ?string $data = null;

    #[ORM\Column(length: 255)]
    private ?string $entrega = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?StatusPedido $statusPedido = null;

    #[ORM\Column(length: 255)]
    private ?string $total = null;

    /**
     * @var Collection<int, ItemPedido>
     */
    #[ORM\OneToMany(targetEntity: ItemPedido::class, mappedBy: 'pedido', cascade: ["persist"])]
    private Collection $itensPedido;

    public function __construct()
    {
        $this->itensPedido = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): static
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getMetodoPagamento(): ?MetodoDePagamento
    {
        return $this->metodoPagamento;
    }

    public function setMetodoPagamento(?MetodoDePagamento $metodoPagamento): static
    {
        $this->metodoPagamento = $metodoPagamento;

        return $this;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(string $data): static
    {
        $this->data = $data;

        return $this;
    }

    public function getEntrega(): ?string
    {
        return $this->entrega;
    }

    public function setEntrega(string $entrega): static
    {
        $this->entrega = $entrega;

        return $this;
    }

    public function getStatusPedido(): ?StatusPedido
    {
        return $this->statusPedido;
    }

    public function setStatusPedido(?StatusPedido $statusPedido): static
    {
        $this->statusPedido = $statusPedido;

        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): static
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return Collection<int, ItemPedido>
     */
    public function getItensPedido(): Collection
    {
        return $this->itensPedido;
    }

    public function addItensPedido(ItemPedido $itensPedido): static
    {
        if (!$this->itensPedido->contains($itensPedido)) {
            $this->itensPedido->add($itensPedido);
            $itensPedido->setPedido($this);
        }

        return $this;
    }

    public function removeItensPedido(ItemPedido $itensPedido): static
    {
        if ($this->itensPedido->removeElement($itensPedido)) {
            // set the owning side to null (unless already changed)
            if ($itensPedido->getPedido() === $this) {
                $itensPedido->setPedido(null);
            }
        }

        return $this;
    }
}
