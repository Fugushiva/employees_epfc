<?php

namespace App\Entity;

use App\Repository\DeptTitleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
//jerome
#[ORM\Table('dept_title')]
#[ORM\Entity(repositoryClass: DeptTitleRepository::class)]
class DeptTitle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id')]
    private ?int $id = null;


    #[ORM\ManyToOne(inversedBy: 'deptTitles')]
    #[ORM\JoinColumn(name: 'dept_no', nullable: false, referencedColumnName: 'dept_no')]
    private ?Departement $departement = null;

    #[ORM\Column(name: 'title_id')]
    private ?int $titleId = null;










    public function getId(): ?int
    {
        return $this->id;
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
