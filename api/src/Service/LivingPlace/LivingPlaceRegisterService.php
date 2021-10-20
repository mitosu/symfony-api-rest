<?php



namespace App\Service\LivingPlace;

use App\Entity\LivingPlace;
use App\Exception\LivingPlace\LivingPlaceAlreadyExistsException;
use App\Repository\LivingPlaceRepository;
use App\Service\Request\RequestService;
use Symfony\Component\HttpFoundation\Request;

class LivingPlaceRegisterService
{
    private LivingPlaceRepository $livingPlaceRepository;

    public function __construct(LivingPlaceRepository $livingPlaceRepository)
    {
        $this->livingPlaceRepository = $livingPlaceRepository;
    }

    public function create(Request $request): LivingPlace
    {
        $name = RequestService::getField($request, 'name');
        $numberRooms = RequestService::getField($request, 'numberRooms');
        $city = RequestService::getField($request, 'city');
        $province = RequestService::getField($request, 'province');
        $postalCode = RequestService::getField($request, 'postalCode');
        $address = RequestService::getField($request, 'address');

        $livingPlace = new LivingPlace(
            $name, $numberRooms, $city,
            $province, $postalCode, $address
        );

        try {
            $this->livingPlaceRepository->save($livingPlace);
        }catch (\Exception $exception){
            throw LivingPlaceAlreadyExistsException::fromName($name);
        }

        return $livingPlace;
    }
}