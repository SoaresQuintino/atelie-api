<?php

namespace App\Entity;

use App\Repository\CartaoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('cartoes')]
#[ORM\Entity(repositoryClass: CartaoRepository::class)]
class Cartao
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $numero = null;

    #[ORM\Column(length: 255)]
    private ?string $nome_titular = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $data_validade = null;

    #[ORM\Column(length: 255)]
    private ?string $codigo_seguranca = null;

    #[ORM\Column(length: 255)]
    private ?string $bandeira = null;

    #[ORM\Column(length: 255)]
    private ?string $tipo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): static
    {
        $this->numero = $numero;

        return $this;
    }

    public function getNomeTitular(): ?string
    {
        return $this->nome_titular;
    }

    public function setNomeTitular(string $nome_titular): static
    {
        $this->nome_titular = $nome_titular;

        return $this;
    }

    public function getDataValidade(): ?\DateTimeInterface
    {
        return $this->data_validade;
    }

    public function setDataValidade(\DateTimeInterface $data_validade): static
    {
        $this->data_validade = $data_validade;

        return $this;
    }

    public function getCodigoSeguranca(): ?string
    {
        return $this->codigo_seguranca;
    }

    public function setCodigoSeguranca(string $codigo_seguranca): static
    {
        $this->codigo_seguranca = $codigo_seguranca;

        return $this;
    }

    public function getBandeira(): ?string
    {
        return $this->bandeira;
    }

    public function setBandeira(string $bandeira): static
    {
        $this->bandeira = $bandeira;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): static
    {
        $this->tipo = $tipo;

        return $this;
    }
}
