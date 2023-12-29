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
}
