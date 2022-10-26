<?php

namespace App\Entity;

use App\Repository\ClienteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClienteRepository::class)]
class Cliente
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nome = null;

    #[ORM\Column(length: 100)]
    private ?string $Email = null;

    #[ORM\Column(length: 100)]
    private ?string $Endereco = null;

    #[ORM\Column(length: 16)]
    private ?string $Cpf = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getCpf(): ?string
    {
        return $this->Cpf;
    }

    public function setCpf(string $Cpf): self
    {
        $this->Cpf = $Cpf;

        return $this;
    }

    public function getEndereco(): ?string
    {
        return $this->Endereco;
    }

    public function setEndereco(string $Endereco): self
    {
        $this->Endereco = $Endereco;

        return $this;
    }
}
