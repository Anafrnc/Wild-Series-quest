<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use PhpParser\ErrorHandler\Collecting;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

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

    public function getcategory(): ?string
    {
        return $this->name;
    }

    public function setcategory(string $name): self
    {
        $this->name = $name;

        return $this;
    }
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Program", mappedBy="category")
     */
    private $programs;

    public function __construct()
    {
        $this->programs = new ArrayCollection();
    }

    /**
     * @return Collection|Program[]
     */
    /**
     * @return ArrayCollection
     */
    public function getPrograms(): Collection
    {
        return $this->programs;
    }
    /**
     * param Program $program
     * @return Category
     */
    public function addProgram(Program $program): self
    {
        if (!$this->programs->contains($program)){
            $program->setCategory($this);
        }
        return $this;
    }

    /**
     * @param Program $program
     * return Category
     */
    public function removeProgram(Program $program): self
    {
        if ($this->programs->contains($program)){
            $this->$program->removeElement($program);
// set the owning side to null (unless already changed)
            if ($program->getCategory() === $this) {
                $program->setCategory(null);
            }
        }
        return $this;
    }
}

