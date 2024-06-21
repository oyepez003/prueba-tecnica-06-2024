<?php

namespace App\Entity;

use App\Repository\ContentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Serializer\Annotation as Serializer;

#[ORM\Entity(repositoryClass: ContentRepository::class)]
class Content
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Serializer\Groups('dto')]
    private ?int $id = null;

    #[ORM\Column(type: Types::GUID)]
    #[Serializer\Groups('dto')]
    private ?string $uuid = null;

    #[ORM\Column(length: 255)]
    #[Constraints\NotBlank]
    #[Serializer\Groups('dto')]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    #[Constraints\NotBlank]
    #[Serializer\Groups('dto')]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Constraints\NotBlank]
    #[Constraints\Url]
    #[Serializer\Groups('dto')]
    private ?string $image = null;

    #[ORM\Column(length: 12)]
    #[Constraints\NotBlank]
    #[Constraints\Locale]
    #[Serializer\Groups('dto')]
    private ?string $locale = null;

    #[ORM\Column]
    #[Constraints\NotBlank]
    #[Serializer\Groups('dto')]
    private ?float $price = null;

    #[ORM\Column(nullable: true)]
    #[Serializer\Groups('dto')]
    private ?float $saving = null;

    #[ORM\Column(length: 16)]
    #[Constraints\NotBlank]
    #[Constraints\Currency]
    #[Serializer\Groups('dto')]
    private ?string $currency = null;

    /**
     * @var Collection<int, ContentRate>
     */
    #[ORM\OneToMany(targetEntity: ContentRate::class, mappedBy: 'content')]
    private Collection $contentRates;

    public function __construct()
    {
        $this->contentRates = new ArrayCollection();
    }

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

    public function syncFieldsUsing(Content $content) {
        $this->setTitle($content->getTitle());
        $this->setImage($content->getImage());
        $this->setLocale($content->getLocale());
        $this->setPrice($content->getPrice());
        $this->setSaving($content->getSaving());
        $this->setCurrency($content->getCurrency());
    }

    /**
     * @return Collection<int, ContentRate>
     */
    public function getContentRates(): Collection
    {
        return $this->contentRates;
    }

    public function addContentRate(ContentRate $contentRate): static
    {
        if (!$this->contentRates->contains($contentRate)) {
            $this->contentRates->add($contentRate);
            $contentRate->setContent($this);
        }

        return $this;
    }

    public function removeContentRate(ContentRate $contentRate): static
    {
        if ($this->contentRates->removeElement($contentRate)) {
            // set the owning side to null (unless already changed)
            if ($contentRate->getContent() === $this) {
                $contentRate->setContent(null);
            }
        }

        return $this;
    }
}
