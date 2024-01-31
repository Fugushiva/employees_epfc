<?php

namespace App\Entity;

use App\Repository\InternRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('interns')]
#[ORM\Entity(repositoryClass: InternRepository::class)]
class Intern
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'interns')]
    #[ORM\JoinColumn(name: 'emp_no', referencedColumnName:'emp_no')]
    private ?Employee $empNo = null;

    #[ORM\Column(length: 80)]
    private ?string $fullname = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $startDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $endDate = null;

    #[ORM\ManyToOne(inversedBy: 'interns')]
    #[ORM\JoinColumn(name: 'dept_no', referencedColumnName:'dept_no')]
    private ?Departement $deptNo = null;

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmpNo(): ?Employee
    {
        return $this->empNo;
    }

    public function setEmpNo(?Employee $empNo): static
    {
        $this->empNo = $empNo;

        return $this;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): static
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getDeptNo(): ?Departement
    {
        return $this->deptNo;
    }

    public function setDeptNo(?Departement $deptNo): static
    {
        $this->deptNo = $deptNo;

        return $this;
    }
}