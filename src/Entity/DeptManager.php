<?php

namespace App\Entity;

use App\Repository\DeptManagerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('dept_manager')]
#[ORM\Entity(repositoryClass: DeptManagerRepository::class)]
class DeptManager
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    private ?int $empNo = null;

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "NONE")]
    #[ORM\Column(name: "dept_no", length: 4)]
    private ?string $deptNo = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fromDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $toDate = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'emp_no', nullable: false, referencedColumnName: 'emp_no')]
    private ?Employee $employee = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'dept_no', nullable: false, referencedColumnName: 'dept_no')]
    private ?Departement $departement = null;

    public function getEmpNo(): ?int
    {
        return $this->empNo;
    }

    public function setEmpNo(int $empNo): static
    {
        $this->empNo = $empNo;

        return $this;
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

    public function getFromDate(): ?\DateTimeInterface
    {
        return $this->fromDate;
    }

    public function setFromDate(\DateTimeInterface $fromDate): static
    {
        $this->fromDate = $fromDate;

        return $this;
    }

    public function getToDate(): ?\DateTimeInterface
    {
        return $this->toDate;
    }

    public function setToDate(\DateTimeInterface $toDate): static
    {
        $this->toDate = $toDate;

        return $this;
    }

    public function getEmployee(): ?Employee
    {
        return $this->employee;
    }

    public function setEmployee(?Employee $employee): static
    {
        $this->employee = $employee;

        return $this;
    }


    public function getDepartement(): ?Departement
    {
        return $this->departement;
    }

    public function setDepartement(?Departement $departement): static
    {
        $this->departement = $departement;

        return $this;
    }
}