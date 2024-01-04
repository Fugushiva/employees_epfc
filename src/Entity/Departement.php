<?php

namespace App\Entity;

use App\Repository\DepartementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

//jerome
#[ORM\Table('departments')]
#[ORM\Entity(repositoryClass: DepartementRepository::class)]
class Departement
{


    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "NONE")]
    #[ORM\Column(name: 'dept_no', length: 4)]
    private ?string $deptNo = null;

    #[ORM\Column(length: 40, unique: true)]
    private ?string $deptName = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $roi = null;


    #[ORM\OneToMany(mappedBy: 'departement', targetEntity: DeptEmp::class)]
    private Collection $employees;

    #[ORM\OneToOne(mappedBy: 'departement', cascade: ['persist', 'remove'], targetEntity: DeptManager::class)]
    private ?DeptManager $manager = null;

    #[ORM\OneToMany(mappedBy: 'departement', targetEntity: DeptTitle::class)]
    private Collection $deptTitles;





    public function __construct()
    {
        $this->employees = new ArrayCollection();
        $this->deptTitles = new ArrayCollection();
      
    }

    public function getEmployees(): Collection
    {
        return $this->employees;
    }


    public function getDeptNo(): ?string
    {
        return $this->deptNo;
    }

    public function setDeptNo(string $deptNo): static
    {
        $this->deptNo = $deptNo;

        return $this;
    }

    public function getDeptName(): ?string
    {
        return $this->deptName;
    }

    public function setDeptName(string $deptName): static
    {
        $this->deptName = $deptName;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getRoi(): ?string
    {
        return $this->roi;
    }

    public function setRoi(?string $roi): static
    {
        $this->roi = $roi;

        return $this;
    }

    public function addEmployee(DeptEmp $deptEmp): self
    {
        if (!$this->employees->contains($deptEmp)) {
            $this->employees[] = $deptEmp;
            $deptEmp->setDepartement($this);
        }

        return $this;
    }

    public function removeEmployee(DeptEmp $deptEmp): self
    {
        if ($this->employees->removeElement($deptEmp)) {
            // set the owning side to null (unless already changed)
            if ($deptEmp->getDepartement() === $this) {
                $deptEmp->setDepartement(null);
            }
        }

        return $this;
    }

    public function getManager(): ?DeptManager
    {
        return $this->manager;
    }

    public function setManager(DeptManager $manager): static
    {
        // set the owning side of the relation if necessary
        if ($manager->getDepartement() !== $this) {
            $manager->setDepartement($this);
        }

        $this->manager = $manager;

        return $this;
    }

    /**
     * @return Collection<int, DeptTitle>
     */
    public function getDeptTitles(): Collection
    {
        return $this->deptTitles;
    }

    public function addDeptTitle(DeptTitle $deptTitle): static
    {
        if (!$this->deptTitles->contains($deptTitle)) {
            $this->deptTitles->add($deptTitle);
            $deptTitle->setDepartement($this);
        }

        return $this;
    }

    public function removeDeptTitle(DeptTitle $deptTitle): static
    {
        if ($this->deptTitles->removeElement($deptTitle)) {
            // set the owning side to null (unless already changed)
            if ($deptTitle->getDepartement() === $this) {
                $deptTitle->setDepartement(null);
            }
        }

        return $this;
    }


}
