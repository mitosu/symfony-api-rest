<?php

declare(strict_types=1);

namespace App\Exception\LivingPlace;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LivingPlaceNotFoundException extends NotFoundHttpException
{
    private const MESSAGE = 'Living place with name %s not found';

    /**
     * @param string $name
     */
    public static function fromName(string $name): self
    {
        throw new self(\sprintf(self::MESSAGE, $name));
    }

}