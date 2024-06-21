<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_USERNAME', fields: ['username'])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Serializer\Groups('dto')]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    #[Constraints\NotBlank(groups : ['register'])]
    #[Serializer\Groups('dto')]
    private ?string $username = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    #[Serializer\Groups('dto')]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    #[Constraints\NotBlank(groups : ['register'])]
    private ?string $password = null;

    /**
     * @var string The hashed password
     */
    #[ORM\Column(nullable: true)]
    #[Constraints\NotBlank(groups : ['update'])]
    #[Serializer\Groups('dto')]
    private ?string $name = null;

    /**
     * @var string The hashed password
     */
    #[ORM\Column(nullable: true)]
    #[Constraints\NotBlank(groups : ['update'])]
    #[Serializer\Groups('dto')]
    private ?string $lastName = null;

    /**
     * @var string The hashed password
     */
    #[ORM\Column(nullable: true)]
    #[Constraints\NotBlank(groups : ['update'])]
    #[Serializer\Groups('dto')]
    private ?string $email = null;

    /**
     * @var string The hashed password
     */
    #[ORM\Column(nullable: true)]
    #[Constraints\NotBlank(groups : ['update'])]
    #[Serializer\Groups('dto')]
    private ?int $age = null;

    /**
     * @var string The hashed password
     */
    #[ORM\Column(nullable: true)]
    #[Serializer\Groups('dto')]
    private ?string $phone = null;

    /**
     * @var Collection<int, ContentRate>
     */
    #[ORM\OneToMany(targetEntity: ContentRate::class, mappedBy: 'created_by')]
    private Collection $contentRates;

    public function __construct()
    {
        $this->contentRates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function syncFieldsUsing(User $user) {
        $this->setName($user->getName());
        $this->setLastName($user->getLastName());
        $this->setAge($user->getAge());
        $this->setPhone($user->getPhone());
        $this->setEmail($user->getEmail());
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
            $contentRate->setCreatedBy($this);
        }

        return $this;
    }

    public function removeContentRate(ContentRate $contentRate): static
    {
        if ($this->contentRates->removeElement($contentRate)) {
            // set the owning side to null (unless already changed)
            if ($contentRate->getCreatedBy() === $this) {
                $contentRate->setCreatedBy(null);
            }
        }

        return $this;
    }
}
