<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\EmpresaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table('empresas')]
#[ORM\Entity(repositoryClass: EmpresaRepository::class)]
#[ApiResource]

class Empresa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ApiProperty(example:"Atelie Bela Arte")]
    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[Assert\Regex("/^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/")]
    #[ORM\Column(length: 255, unique: true)]
    private ?string $cnpj = null;

    #[ApiProperty(example:"João Finotti 32")]
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Endereco $endereco = null;


    #[Assert\Regex("/^\(\d{2}\) \d{4,5}-\d{4}$/")]
    #[ORM\Column(length: 255)]
    private ?string $telefone = null;

    #[ApiProperty(example:" ateliebelaarte@gmail.com ")]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;


    #[ORM\Column(length: 255)]
    private ?string $setor = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): static
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCnpj(): ?string
    {
        return $this->cnpj;
    }

    public function setCnpj(string $cnpj): static
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    public function getEndereco(): ?Endereco
    {
        return $this->endereco;
    }

    public function setEndereco(?Endereco $endereco): static
    {
        $this->endereco = $endereco;

        return $this;
    }


    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): static
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getSetor(): ?string
    {
        return $this->setor;
    }

    public function setSetor(string $setor): static
    {
        $this->setor = $setor;

        return $this;
    }
}
