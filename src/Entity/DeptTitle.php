<?php

namespace App\Entity;

use App\Repository\DeptTitleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table('dept_title')]
#[ORM\Entity(repositoryClass: DeptTitleRepository::class)]
class DeptTitle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 4)]
    private ?string $deptNo = null;

    #[ORM\Column]
    private ?int $titleId = null;

    #[ORM\ManyToOne(inversedBy: 'deptTitles')]
    private ?Title $title = null;

    #[ORM\ManyToOne(inversedBy: 'deptTitles')]
    #[ORM\JoinColumn(name: 'dept_no', nullable: false, referencedColumnName: 'dept_no')]
    private ?Departement $departement = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTitleId(): ?int
    {
        return $this->titleId;
    }

    public function setTitleId(int $titleId): static
    {
        $this->titleId = $titleId;

        return $this;
    }

    public function getTitles(): ?Title
    {
        return $this->title;
    }

    public function setTitles(?Title $title): static
    {
        $this->title = $title;

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
