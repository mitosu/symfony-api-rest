<?php

declare(strict_types=1);

namespace App\Entity;

use Symfony\Component\Uid\Uuid;

class LivingPlace
{
    private string $id;
    private string $name;
    private ?string $description;
    private string $numberRooms;
    private string $city;
    private string $province;
    private string $postalCode;
    private string $address;
    private ?string $coverPhoto;
    private bool $active;
    private \DateTime $createdAt;
    private \DateTime $updatedAt;

    /**
     * @param string $name
     * @param string $numberRooms
     * @param string $city
     * @param string $province
     * @param string $postalCode
     * @param string $address
     */
    public function __construct(string $name, string $numberRooms, string $city, string $province, string $postalCode, string $address)
    {
        $this->id = Uuid::v4()->toRfc4122();
        $this->name = $name;
        $this->numberRooms = $numberRooms;
        $this->city = $city;
        $this->province = $province;
        $this->postalCode = $postalCode;
        $this->address = $address;
        $this->active = false;
        $this->createdAt = new \DateTime();
        $this->markAsUpdated();
    }

    /**
     * @return string
     */
    public function getId(): string
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
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getNumberRooms(): string
    {
        return $this->numberRooms;
    }

    /**
     * @param string $numberRooms
     */
    public function setNumberRooms(string $numberRooms): void
    {
        $this->numberRooms = $numberRooms;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getProvince(): string
    {
        return $this->province;
    }

    /**
     * @param string $province
     */
    public function setProvince(string $province): void
    {
        $this->province = $province;
    }

    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string|null
     */
    public function getCoverPhoto(): ?string
    {
        return $this->coverPhoto;
    }

    /**
     * @param string|null $coverPhoto
     */
    public function setCoverPhoto(?string $coverPhoto): void
    {
        $this->coverPhoto = $coverPhoto;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     */
    public function markAsUpdated(): void
    {
        $this->updatedAt = new \DateTime();
    }


}