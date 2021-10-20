<?php

declare(strict_types=1);

namespace App\Entity;

use LogicException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Uid\Uuid;

/**
 * @method string getUserIdentifier()
 */
class User implements UserInterface
{
    private string $id;
    private string $name;
    private string $email;
    private ?string $password;
    private ?string $avatar;
    private ?string $token;
    private ?string $resetPasswordToken;
    private bool $active;
    private \DateTime $createdAt;
    private \DateTime $updatedAt;

    public function __construct($name, $email)
    {
        $this->id = Uuid::v4()->toRfc4122();
        $this->name = $name;
        $this->setEmail($email);
        $this->password = null;
        $this->avatar = null;
        $this->token = \sha1(\uniqid('', true));
        $this->resetPasswordToken = null;
        $this->active = false;
        $this->createdAt = new \DateTime();
        $this->markAsUpdated();
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param $name
     * @return void
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param $email
     * @return void
     */
    public function setEmail($email): void
    {
        if(!\filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new LogicException('Invalid email');
        }

        $this->email = $email;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param $password
     * @return void
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * Get the value of avatar
     */ 
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set the value of avatar
     *
     * @param $avatar
     * @return void
     */
    public function setAvatar($avatar): void
    {
        $this->avatar = $avatar;
    }

    /**
     * Get the value of token
     */ 
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the value of token
     *
     * @param $token
     * @return void
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }

    /**
     * Get the value of resetPasswordToken
     */ 
    public function getResetPasswordToken()
    {
        return $this->resetPasswordToken;
    }

    /**
     * Set the value of resetPasswordToken
     *
     * @param $resetPasswordToken
     * @return void
     */
    public function setResetPasswordToken($resetPasswordToken): void
    {
        $this->resetPasswordToken = $resetPasswordToken;
    }

    /**
     * Get the value of active
     */ 
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set the value of active
     *
     * @param $active
     * @return void
     */
    public function setActive($active): void
    {
        $this->active = $active;
    }

    /**
     * Get the value of createdAt
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Get the value of updatedAt
     */ 
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @return void
     */
    public function markAsUpdated(): void
    {
        $this->updatedAt = new \DateTime();
    }

    public function getRoles(): array
    {
        return [];
    }

    public function getSalt(): void
    {
    }

    public function eraseCredentials():void
    {
    }

    public function getUsername(): string
    {
        return $this->email;
    }
}