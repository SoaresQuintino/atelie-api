<?php

namespace App\Entity;

use App\Repository\ColecaoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Table("colecoes")]
#[ORM\Entity(repositoryClass: ColecaoRepository::class)]
#[ApiResource()]
class Colecao
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

 

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(length: 255)]
    private ?string $descricao = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imagem = null;

    #[ORM\Column(length: 255)]
    private ?string $ativo = null;

    /**
     * @var Collection<int, Produto>
     */
    #[ORM\ManyToMany(targetEntity: Produto::class)]
    private Collection $produtos;

    public function __construct()
    {
        $this->produtos = new ArrayCollection();
    }

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

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): static
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getImagem(): ?string
    {
        return $this->imagem;
    }

    public function setImagem(?string $imagem): static
    {
        $this->imagem = $imagem;

        return $this;
    }

    public function getAtivo(): ?string
    {
        return $this->ativo;
    }

    public function setAtivo(string $ativo): static
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * @return Collection<int, Produto>
     */
    public function getProdutos(): Collection
    {
        return $this->produtos;
    }

    public function addProduto(Produto $produto): static
    {
        if (!$this->produtos->contains($produto)) {
            $this->produtos->add($produto);
        }

        return $this;
    }

    public function removeProduto(Produto $produto): static
    {
        $this->produtos->removeElement($produto);

        return $this;
    }
}
