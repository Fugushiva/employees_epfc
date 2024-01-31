<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;


#[ORM\Table('cars')]
#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 15)]
    private ?string $registrationNumber = null;

    #[ORM\Column(length: 50)]
    private ?string $model = null;

    #[ORM\OneToOne(mappedBy: 'carId', cascade: ['persist', 'remove'])]
    
    private ?CarEmp $carEmp = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRegistrationNumber(): ?string
    {
        return $this->registrationNumber;
    }

    public function setRegistrationNumber(string $registrationNumber): static
    {
        $this->registrationNumber = $registrationNumber;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getCarEmp(): ?CarEmp
    {
        return $this->carEmp;
    }

    public function setCarEmp(?CarEmp $carEmp): static
    {
        // unset the owning side of the relation if necessary
        if ($carEmp === null && $this->carEmp !== null) {
            $this->carEmp->setCarId(null);
        }

        // set the owning side of the relation if necessary
        if ($carEmp !== null && $carEmp->getCarId() !== $this) {
            $carEmp->setCarId($this);
        }

        $this->carEmp = $carEmp;

        return $this;
    }
}
