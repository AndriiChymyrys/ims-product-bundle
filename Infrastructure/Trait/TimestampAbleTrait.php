<?php

declare(strict_types=1);

namespace WideMorph\Ims\Bundle\ImsProductBundle\Infrastructure\Trait;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

trait TimestampAbleTrait
{
    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected DateTime $createdAt;

    /**
     * @ORM\Column(type="datetime", name="updated_at", nullable=true)
     */
    protected ?DateTime $updatedAt;

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAt(): void
    {
        $this->createdAt = new DateTime();
    }

    /**
     * @return DateTime|null
     */
    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAt(): void
    {
        $this->updatedAt = new DateTime();
    }
}
