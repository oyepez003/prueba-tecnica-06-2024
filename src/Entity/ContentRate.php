<?php

namespace App\Entity;

use App\Repository\ContentRateRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Serializer\Annotation as Serializer;

#[ORM\Entity(repositoryClass: ContentRateRepository::class)]
class ContentRate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Serializer\Groups('dto')]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'contentRates')]
    #[Serializer\Groups('dto')]
    private ?Content $content = null;

    #[ORM\ManyToOne(inversedBy: 'contentRates')]
    #[Serializer\Groups('dto')]
    private ?User $created_by = null;

    #[ORM\Column]
    #[Serializer\Groups('dto')]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(type: Types::SMALLINT)]
    #[Constraints\NotBlank(groups : ['rate'])]
    #[Constraints\Range(min: 1, max: 5, groups : ['rate'])]
    #[Serializer\Groups('dto')]
    private ?int $rate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?Content
    {
        return $this->content;
    }

    public function setContent(?Content $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedBy(): ?User
    {
        return $this->created_by;
    }

    public function setCreatedBy(?User $created_by): static
    {
        $this->created_by = $created_by;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getRate(): ?int
    {
        return $this->rate;
    }

    public function setRate(int $rate): static
    {
        $this->rate = $rate;

        return $this;
    }
}
