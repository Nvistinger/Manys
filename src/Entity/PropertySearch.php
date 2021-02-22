<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

class PropertySearch {

    /**
     * @var int|null
     */
    private $maxPrice;

    /**
     * @var int|null
     * @Assert\Range(min="25", max="200")
     */
    private $minSurface;

    /**
     * @var ArrayCollection
     */
    private $selections;

    /**
     * @var integer|null
     */
    private $distance;

    /**
     * @var float|null
     */
    private $lat;

    /**
     * @var string|null
     */
    private $address;

    /**
     * @var float|null
     */
    private$lng;

    public function __construct()
    {
        $this->selections = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    /**
     * @param int|null $maxPrice
     * @return PropertySearch
     */
    public function setMaxPrice(int $maxPrice): PropertySearch
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMinSurface(): ?int
    {
        return $this->minSurface;
    }

    /**
     * @param int|null $minSurface
     * @return PropertySearch
     */
    public function setMinSurface(int $minSurface): PropertySearch
    {
        $this->minSurface = $minSurface;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getSelections(): ArrayCollection
    {
        return $this->selections;
    }

    /**
     * @param ArrayCollection $selections
     */
    public function setSelections(ArrayCollection $selections): void
    {
        $this->selections = $selections;
    }

    /**
     * @param int|null $distance
     * @return PropertySearch
     */
    public function setDistance(?int $distance): PropertySearch
    {
        $this->distance = $distance;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDistance(): ?int
    {
        return $this->distance;
    }

    /**
     * @param float|null $lat
     * @return PropertySearch
     */
    public function setLat(?float $lat): PropertySearch
    {
        $this->lat = $lat;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getLat(): ?float
    {
        return $this->lat;
    }

    /**
     * @param float|null $lng
     * @return PropertySearch
     */
    public function setLng(?float $lng): PropertySearch
    {
        $this->lng = $lng;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getLng(): ?float
    {
        return $this->lng;
    }

    /**
     * @param string|null $address
     * @return PropertySearch
     */
    public function setAddress(?string $address): PropertySearch
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }
}
