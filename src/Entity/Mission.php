<?php

namespace App\Entity;

use App\Repository\MissionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('missions')]
#[ORM\Entity(repositoryClass: MissionRepository::class)]
class Mission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dueDate = null;

    #[ORM\Column(length: 30)]
    private ?string $status = null;

    #[ORM\ManyToMany(targetEntity: Employee::class, inversedBy: 'missions')]
    #[ORM\JoinTable(
        name: "employee_mission",
        joinColumns: [new ORM\JoinColumn(name: "mission_id", referencedColumnName: "id")],
        inverseJoinColumns: [new ORM\JoinColumn(name: "emp_no", referencedColumnName: "emp_no")]
    )]
    private Collection $employee;

    public function __construct()
    {
        $this->employee = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

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

    public function getDueDate(): ?\DateTimeInterface
    {
        return $this->dueDate;
    }

    public function setDueDate(\DateTimeInterface $dueDate): static
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, Employee>
     */
    public function getEmployee(): Collection
    {
        return $this->employee;
    }

    public function addEmployee(Employee $employee): static
    {
        if (!$this->employee->contains($employee)) {
            $this->employee->add($employee);
        }

        return $this;
    }

    public function removeEmployee(Employee $employee): static
    {
        $this->employee->removeElement($employee);

        return $this;
    }
}