<?php

namespace App\Entity;

use App\Repository\ContentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints;

#[ORM\Entity(repositoryClass: ContentRepository::class)]
class Content
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::GUID)]
    private ?string $uuid = null;

    #[ORM\Column(length: 255)]
    #[Constraints\NotBlank]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    #[Constraints\NotBlank]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Constraints\NotBlank]
    #[Constraints\Url]
    private ?string $image = null;

    #[ORM\Column(length: 12)]
    #[Constraints\NotBlank]
    #[Constraints\Locale]
    private ?string $locale = null;

    #[ORM\Column]
    #[Constraints\NotBlank]
    private ?float $price = null;

    #[ORM\Column(nullable: true)]
    private ?float $saving = null;

    #[ORM\Column(length: 16)]
    #[Constraints\NotBlank]
    #[Constraints\Currency]
    private ?string $currency = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): static
    {
        $this->uuid = $uuid;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): static
    {
        $this->locale = $locale;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getSaving(): ?float
    {
        return $this->saving;
    }

    public function setSaving(?float $saving): static
    {
        $this->saving = $saving;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): static
    {
        $this->currency = $currency;

        return $this;
    }
}
