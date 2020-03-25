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
}