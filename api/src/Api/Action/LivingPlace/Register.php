<?php

declare(strict_types=1);

namespace App\Api\Action\LivingPlace;

use App\Entity\LivingPlace;
use App\Service\LivingPlace\LivingPlaceRegisterService;
use Symfony\Component\HttpFoundation\Request;

class Register
{
    private LivingPlaceRegisterService $livingPlaceRegisterService;

    public function __construct(LivingPlaceRegisterService $livingPlaceRegisterService)
    {
        $this->livingPlaceRegisterService = $livingPlaceRegisterService;
    }

    public function __invoke(Request $request): LivingPlace
    {
        return $this->livingPlaceRegisterService->create($request);
    }

}