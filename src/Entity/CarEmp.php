<?php

namespace App\Entity;

use App\Repository\CarEmpRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinColumns;
use Doctrine\ORM\Mapping\JoinTable;


#[ORM\Table('car_emp')]
#[ORM\Entity(repositoryClass: CarEmpRepository::class)]
class CarEmp
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    

    #[ORM\OneToOne(inversedBy: 'carEmp', cascade: ['persist', 'remove'])]
    #[JoinColumn(name:'car_id', referencedColumnName:'id')]
    private ?Car $carId = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $receipDate = null;

    #[ORM\OneToOne(inversedBy: 'carEmp', cascade: ['persist', 'remove'])]
    #[JoinColumn(name:'emp_no', referencedColumnName:'emp_no')]
    private ?Employee $empNo = null;

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getCarId(): ?Car
    {
        return $this->carId;
    }

    public function setCarId(?Car $carId): static
    {
        $this->carId = $carId;

        return $this;
    }

    public function getReceipDate(): ?\DateTimeInterface
    {
        return $this->receipDate;
    }

    public function setReceipDate(\DateTimeInterface $receipDate): static
    {
        $this->receipDate = $receipDate;

        return $this;
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
}
