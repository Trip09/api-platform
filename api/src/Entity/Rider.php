<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\RiderRepository")
 */
class Rider
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Car")
     * @ORM\JoinColumn(name="car_id", referencedColumnName="id", nullable=false)
     */
    private $car;

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

    /**
     * @return mixed
     */
    public function getCar(): ?Car
    {
        return $this->car;
    }

    /**
     * @param Car $car
     *
     * @return $this
     */
    public function setCar(Car $car): self
    {
        $this->car = $car;

        return $this;
    }
}
