<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProdutosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Metadata\ApiProperty;

#[ORM\Table('produtos')]
#[ORM\Entity(repositoryClass: ProdutosRepository::class)]
#[ApiResource]
class Produto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ApiProperty(example:"Carteira Infantil")]
    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categoria $categoria = null;

    #[ApiProperty(example:"Atelie Bela Arte")]
    #[ORM\Column(length: 255)]
    private ?string $marca = null;

   
    #[Assert\Regex("/^\d{3}([.,]\d{1,3})?$/")]
    #[ORM\Column(length: 255)]
    private ?string $peso = null;

    #[ApiProperty(example:"Link da foto")]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $urlimagem = null;

    #[Assert\Regex("/^\d{3}([.,]\d{1,3})?$/")]
    #[ORM\Column(length: 255)]
    private ?string $largura = null;

    #[Assert\Regex("/^\d{3}([.,]\d{1,3})?$/")]
    #[ORM\Column(length: 255)]
    private ?string $altura = null;

    #[Assert\Regex("/^\d{3}([.,]\d{1,3})?$/")]
    #[ORM\Column(length: 255)]
    private ?string $comprimento = null;

    #[ApiProperty(example:"Nossa carteira personalizada é perfeita para as crianças guardarem seu dinheiro...")]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descricao = null;

    /**
     * @var Collection<int, Material>
     */
    #[ORM\ManyToMany(targetEntity: Material::class)]
    private Collection $material;

    public function __construct()
    {
        $this->material = new ArrayCollection();
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

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): static
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getMarca(): ?string
    {
        return $this->marca;
    }

    public function setMarca(string $marca): static
    {
        $this->marca = $marca;

        return $this;
    }

    public function getPeso(): ?string
    {
        return $this->peso;
    }

    public function setPeso(string $peso): static
    {
        $this->peso = $peso;

        return $this;
    }

    public function getUrlimagem(): ?string
    {
        return $this->urlimagem;
    }

    public function setUrlimagem(?string $urlimagem): static
    {
        $this->urlimagem = $urlimagem;

        return $this;
    }

    public function getLargura(): ?string
    {
        return $this->largura;
    }

    public function setLargura(string $largura): static
    {
        $this->largura = $largura;

        return $this;
    }

    public function getAltura(): ?string
    {
        return $this->altura;
    }

    public function setAltura(string $altura): static
    {
        $this->altura = $altura;

        return $this;
    }

    public function getComprimento(): ?string
    {
        return $this->comprimento;
    }

    public function setComprimento(string $comprimento): static
    {
        $this->comprimento = $comprimento;

        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): static
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * @return Collection<int, Material>
     */
    public function getMaterial(): Collection
    {
        return $this->material;
    }

    public function addMaterial(Material $material): static
    {
        if (!$this->material->contains($material)) {
            $this->material->add($material);
        }

        return $this;
    }

    public function removeMaterial(Material $material): static
    {
        $this->material->removeElement($material);

        return $this;
    }
}
