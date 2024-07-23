<?php

namespace App\Entity;

use App\Repository\EnderecoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EnderecoRepository::class)]
#[ORM\Table('enderecos')]
class Endereco
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $rua = null;

    #[ORM\Column(length: 255)]
    private ?string $numero = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $complemento = null;

    #[ORM\Column(length: 255)]
    private ?string $bairro = null;

    #[ORM\Column(length: 255)]
    private ?string $cidade = null;

    #[ORM\Column(length: 255)]
    private ?string $estado = null;

    #[Assert\Regex("/^\d{5}-\d{3}$/")]
    #[ORM\Column(length: 255)]
    private ?string $cep = null;

    #[ORM\Column(length: 255)]
    private ?string $pais = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRua(): ?string
    {
        return $this->rua;
    }

    public function setRua(string $rua): static
    {
        $this->rua = $rua;

        return $this;
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

    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    public function setComplemento(?string $complemento): static
    {
        $this->complemento = $complemento;

        return $this;
    }

    public function getBairro(): ?string
    {
        return $this->bairro;
    }

    public function setBairro(string $bairro): static
    {
        $this->bairro = $bairro;

        return $this;
    }

    public function getCidade(): ?string
    {
        return $this->cidade;
    }

    public function setCidade(string $cidade): static
    {
        $this->cidade = $cidade;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): static
    {
        $this->estado = $estado;

        return $this;
    }

    public function getCep(): ?string
    {
        return $this->cep;
    }

    public function setCep(string $cep): static
    {
        $this->cep = $cep;

        return $this;
    }

    public function getPais(): ?string
    {
        return $this->pais;
    }

    public function setPais(string $pais): static
    {
        $this->pais = $pais;

        return $this;
    }
}
