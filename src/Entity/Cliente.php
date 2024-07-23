<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ClienteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('clientes')]
#[ORM\Entity(repositoryClass: ClienteRepository::class)]
#[ApiResource]

class Cliente extends Pessoa
{
}
