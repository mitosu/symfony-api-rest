<?php

declare(strict_types=1);

namespace App\Exception\LivingPlace;

use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class LivingPlaceAlreadyExistsException extends ConflictHttpException
{
    private const MESSAGE = 'This living place %s already exist';

    public static function fromName(string $name): self
    {
        throw new self(sprintf(self::MESSAGE, $name));
    }

}