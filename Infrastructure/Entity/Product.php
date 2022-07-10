<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Infrastructure\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use WideMorph\Ims\Bundle\ImsProductBundle\Infrastructure\Trait\TimestampAbleEntityTrait;

/**
 * Class Product
 *
 * @package WideMorph\Ims\Bundle\ImsProductBundle\Infrastructure\Entity
 * @repositoryClass App\Repository\ProductRepository
 */
class Product
{
    use TimestampAbleEntityTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    protected mixed $id;

    /**
     * @ORM\Column(name="name", type="string", length=100)
     */
    protected ?string $name;

    /**
     * @ORM\Column(name="description", type="text")
     */
    protected ?string $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductImage", mappedBy="product")
     */
    protected Collection $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId(): mixed
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return Collection<int, ProductImage>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    /**
     * @param ProductImage $image
     *
     * @return $this
     */
    public function addImage(ProductImage $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setProduct($this);
        }

        return $this;
    }

    /**
     * @param ProductImage $image
     *
     * @return $this
     */
    public function removeImage(ProductImage $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getProduct() === $this) {
                $image->setProduct(null);
            }
        }

        return $this;
    }
}
