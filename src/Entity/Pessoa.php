<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PessoaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PessoaRepository::class)]
#[ORM\Table('pessoas')]
#[ORM\InheritanceType('JOINED')]
#[ORM\DiscriminatorColumn('classe', 'string')]
#[ORM\DiscriminatorMap(['pessoa' => 'Pessoa', 'cliente' => 'Cliente'])]
class Pessoa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(length: 255)]
    private ?string $rg = null;

    #[ORM\Column(length: 255, unique: true)]
    #[Assert\Regex('/^[\d]{3}.[\d]{3}.[\d]{3}-[\d]{2}$/')]
    private ?string $cpf = null;

    #[ORM\Column(length: 255)]
    #[Assert\Regex('/^[\d]{2}\/[\d]{2}\/[\d]{4}$/')]
    private ?string $dataNascimento = null;

    #[ORM\ManyToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Endereco $endereco = null;

    #[ORM\Column(length: 255)]
    private ?string $telefone = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $genero = null;

    #[ORM\Column(length: 255)]
    private ?string $tituloEleitoral = null;

    #[ORM\Column(length: 255)]
    private ?string $reservista = null;

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

    public function getRg(): ?string
    {
        return $this->rg;
    }

    public function setRg(string $rg): static
    {
        $this->rg = $rg;

        return $this;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): static
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getDataNascimento(): ?string
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento(string $dataNascimento): static
    {
        $this->dataNascimento = $dataNascimento;

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

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getGenero(): ?string
    {
        return $this->genero;
    }

    public function setGenero(string $genero): static
    {
        $this->genero = $genero;

        return $this;
    }

    public function getTituloEleitoral(): ?string
    {
        return $this->tituloEleitoral;
    }

    public function setTituloEleitoral(string $tituloEleitoral): static
    {
        $this->tituloEleitoral = $tituloEleitoral;

        return $this;
    }

    public function getReservista(): ?string
    {
        return $this->reservista;
    }

    public function setReservista(string $reservista): static
    {
        $this->reservista = $reservista;

        return $this;
    }
}