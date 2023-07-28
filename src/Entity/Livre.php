<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\LivreRepository;
use App\Trait\TimeStampTrait;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\HasLifecycleCallbacks]
#[UniqueEntity('title', message: "ce titre existe déja.")]
#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    use TimeStampTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank(
        message:'Le titre du livre est obligatoire'
    )]
    #[Assert\Length(
        max: 255,
        maxMessage: 'Le titre ne doit pas dépasser {{ limit }} caractères.',
    )]
    #[Assert\Regex(
        pattern: '/^([a-zA-Z]|[à-ü]|[À-Ü])|[0-100]+$/i',
        match: true,
        message: 'Le titre doit contenir uniquement des lettres, des chiffres le tiret du milieu de l\'undescore.',
    )]
    #[ORM\Column(length: 255, unique:true)]
    private ?string $title = null;

    #[Assert\Length(
        max: 50,
        maxMessage: 'Le genre ne doit pas dépasser {{ limit }} caractères.',
    )]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $genre = null;

    #[Assert\Length(
        max: 255,
        maxMessage: "Le nom de l'auteur ne doit pas dépasser {{ limit }} caractères.",
    )]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $author = null;

    #[Assert\Length(
        max: 1,
        maxMessage: "La note ne doit pas dépasser {{ limit }} caractere.",
    )]
    #[Assert\Regex(
        pattern: '/[0-9]/',
        match: true,
        message: "la note n'est pas valide",
    )]
    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $note = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?DateTimeImmutable $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(?string $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}