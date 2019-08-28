<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $category;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="integer")
     */
    private $invite;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="invited_user")
     */
    private $invited_user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="creator_user")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;


    public function __construct()
    {
        $this->invites = new ArrayCollection();
        $this->usersThatInProject = new ArrayCollection();
        $this->invited_user = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCategory(): ?int
    {
        return $this->category;
    }

    public function setCategory(int $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }


    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }


    /**
     * @ORM\PrePersist
     */

    public function setCreatedAt(): self
    {
        if(isset($this->created_at2))
            $this->created_at = $this->created_at2;
        else
            $this->created_at = new \DateTime();
        return $this;
    }


    public function setCreatedAtForFixtures($created_at): self
    {
        $this->created_at2 = $created_at;

        return $this;

    }

    public function getInvite(): ?int
    {
        return $this->invite;
    }

    public function setInvite(int $invite): self
    {
        $this->invite = $invite;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getInvitedUser(): Collection
    {
        return $this->invited_user;
    }

    public function addInvitedUser(User $invitedUser): self
    {
        if (!$this->invited_user->contains($invitedUser)) {
            $this->invited_user[] = $invitedUser;
        }

        return $this;
    }

    public function removeInvitedUser(User $invitedUser): self
    {
        if ($this->invited_user->contains($invitedUser)) {
            $this->invited_user->removeElement($invitedUser);
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }


}
