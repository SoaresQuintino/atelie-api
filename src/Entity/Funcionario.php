<?php

namespace App\Entity;

use App\Repository\FuncionarioRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('funcionarios')]
#[ORM\Entity(repositoryClass: FuncionarioRepository::class)]
class Funcionario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pessoa $pessoa = null;

    #[ORM\Column(length: 255)]
    private ?string $cargo = null;

    #[ORM\Column(length: 255)]
    private ?string $salario = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $horaEntrada = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $horaSaida = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dataAdmissao = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dataSaida = null;

    #[ORM\Column(length: 255)]
    private ?string $regimeDeTrabalho = null;

    #[ORM\Column(length: 255)]
    private ?string $turno = null;

    #[ORM\Column(length: 255)]
    private ?string $ferias = null;

    #[ORM\Column(length: 255)]
    private ?string $falta = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $beneficio = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $horaExtra = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bancoDeHoras = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Empresa $empresa = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPessoa(): ?Pessoa
    {
        return $this->pessoa;
    }

    public function setPessoa(Pessoa $pessoa): static
    {
        $this->pessoa = $pessoa;

        return $this;
    }

    public function getCargo(): ?string
    {
        return $this->cargo;
    }

    public function setCargo(string $cargo): static
    {
        $this->cargo = $cargo;

        return $this;
    }

    public function getSalario(): ?string
    {
        return $this->salario;
    }

    public function setSalario(string $salario): static
    {
        $this->salario = $salario;

        return $this;
    }

    public function getHoraEntrada(): ?\DateTimeInterface
    {
        return $this->horaEntrada;
    }

    public function setHoraEntrada(\DateTimeInterface $horaEntrada): static
    {
        $this->horaEntrada = $horaEntrada;

        return $this;
    }

    public function getHoraSaida(): ?\DateTimeInterface
    {
        return $this->horaSaida;
    }

    public function setHoraSaida(\DateTimeInterface $horaSaida): static
    {
        $this->horaSaida = $horaSaida;

        return $this;
    }

    public function getDataAdmissao(): ?\DateTimeInterface
    {
        return $this->dataAdmissao;
    }

    public function setDataAdmissao(\DateTimeInterface $dataAdmissao): static
    {
        $this->dataAdmissao = $dataAdmissao;

        return $this;
    }

    public function getDataSaida(): ?\DateTimeInterface
    {
        return $this->dataSaida;
    }

    public function setDataSaida(\DateTimeInterface $dataSaida): static
    {
        $this->dataSaida = $dataSaida;

        return $this;
    }

    public function getRegimeDeTrabalho(): ?string
    {
        return $this->regimeDeTrabalho;
    }

    public function setRegimeDeTrabalho(string $regimeDeTrabalho): static
    {
        $this->regimeDeTrabalho = $regimeDeTrabalho;

        return $this;
    }

    public function getTurno(): ?string
    {
        return $this->turno;
    }

    public function setTurno(string $turno): static
    {
        $this->turno = $turno;

        return $this;
    }

    public function getFerias(): ?string
    {
        return $this->ferias;
    }

    public function setFerias(string $ferias): static
    {
        $this->ferias = $ferias;

        return $this;
    }

    public function getFalta(): ?string
    {
        return $this->falta;
    }

    public function setFalta(string $falta): static
    {
        $this->falta = $falta;

        return $this;
    }

    public function getBeneficio(): ?string
    {
        return $this->beneficio;
    }

    public function setBeneficio(?string $beneficio): static
    {
        $this->beneficio = $beneficio;

        return $this;
    }

    public function getHoraExtra(): ?string
    {
        return $this->horaExtra;
    }

    public function setHoraExtra(?string $horaExtra): static
    {
        $this->horaExtra = $horaExtra;

        return $this;
    }

    public function getBancoDeHoras(): ?string
    {
        return $this->bancoDeHoras;
    }

    public function setBancoDeHoras(?string $bancoDeHoras): static
    {
        $this->bancoDeHoras = $bancoDeHoras;

        return $this;
    }

    public function getEmpresa(): ?Empresa
    {
        return $this->empresa;
    }

    public function setEmpresa(?Empresa $empresa): static
    {
        $this->empresa = $empresa;

        return $this;
    }
}
