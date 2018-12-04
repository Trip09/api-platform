<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={
 *          "groups": {"ride:list:read"}
 *     },
 *     itemOperations={
 *              "get": {"normalizationContext": {"groups": {"ride:list:read"}}}
 *          },
 *     collectionOperations={"get"}
 * )
 * @ApiFilter(PropertyFilter::class)
 * @ApiFilter(OrderFilter::class)
 * @ORM\Entity(repositoryClass="App\Repository\RideRepository")
 */
class Ride
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"ride:list:read"})
     * @ApiFilter(SearchFilter::Class, strategy="ipartial")
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Car")
     * @Groups({"ride:list:read"})
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
     * @return Car
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
