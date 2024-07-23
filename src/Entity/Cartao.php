<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Repository\CartaoRepository;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table('cartoes')]
#[ORM\Entity(repositoryClass: CartaoRepository::class)]
#[ApiResource()]
#[GetCollection("cartoes")]
#[Get("cartoes/{id}")]
#[Post("cartoes")]
#[Put("cartoes/{id}")]
#[Patch("cartoes/{id}")]
#[Delete("cartoes/{id}")]

class Cartao
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Regex("/^[\d]{15,16}$/")]
    private ?string $numero = null;

    #[ORM\Column(length: 255)]
    private ?string $nomeTitular = null;

    
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Context([DateTimeNormalizer::FORMAT_KEY=>"m/y"])]
    #[ApiProperty(example:"12/32")]
    private ?\DateTime $dataValidade = null;

    #[ORM\Column(length: 255)]
    #[Assert\Regex("/^[\d]{3,4}$/")]
    private ?string $codigoSeguranca = null;

    #[ORM\Column(length: 255)]
    #[ApiProperty(example:"Mastercard")]
    private ?string $bandeira = null;

    #[ORM\Column(length: 255)]
    #[ApiProperty(example:"Debito")]
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
        return $this->nomeTitular;
    }

    public function setNomeTitular(string $nomeTitular): static
    {
        $this->nomeTitular = $nomeTitular;

        return $this;
    }

    public function getDataValidade(): ?\DateTimeInterface
    {
        return $this->dataValidade;
    }

    public function setDataValidade(\DateTimeInterface $dataValidade): static
    {
        $this->dataValidade = $dataValidade;

        return $this;
    }

    public function getCodigoSeguranca(): ?string
    {
        return $this->codigoSeguranca;
    }

    public function setCodigoSeguranca(string $codigoSeguranca): static
    {
        $this->codigoSeguranca = $codigoSeguranca;

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
