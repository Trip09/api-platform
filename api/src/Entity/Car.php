<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * A Uber car avaialable to rent
 *
 * @ORM\Entity
 * @ApiResource(iri= "http://schema.org/Car")
 *
 * @ApiFilter(PropertyFilter::class)
 */
class Car
{

    /**
     * A id for the car
     *
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var int
     */
    private $id;

    /**
     * A nice brand of the car
     *
     * @ORM\Column(type="string")
     * @ApiProperty(iri= "https://schema.org/brand")
     * @Groups({"ride:list:read"})
     * @ApiFilter(SearchFilter::Class, strategy="ipartial")
     *
     * @var string
     */
    public $brand;

    /**
     *
     * @ORM\Column(type="string")
     * @Groups({"ride:list:read"})
     *
     * @var string
     */
    public $model;

    /**
     *
     * @ORM\Column(type="string")
     *
     * @var string
     */
    public $plateNumber;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
