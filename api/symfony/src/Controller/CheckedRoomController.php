<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\RoomsFactory\CheckedRoomFactory;

class CheckedRoomController extends AbstractController
{

    #[Route('/api/room/{id}')]
    public function index(int $id): Response
    {
        $checkedRoom = $this->getCheckedFakeRoom($id);

        if (is_null($checkedRoom)) {
            return $this->json(
                null,
                404,
                headers: ['Content-Type' => 'application/json;charset=UTF-8']
            );
        }

        return $this->json(
            $checkedRoom,
            200,
            headers: ['Content-Type' => 'application/json;charset=UTF-8']
        );
    }

    private function getCheckedFakeRoom(int $id)
    {
        switch ($id) {
            case 1:
                return CheckedRoomFactory::setCheckedRoom("onRequest", 23990, "CZK");
            case 2:
                return CheckedRoomFactory::setCheckedRoom("available", 20490, "CZK");
            case 3:
                return CheckedRoomFactory::setCheckedRoom("soldOut");
            case 4:
                return CheckedRoomFactory::setCheckedRoom("error");
            default:
                return null;
        }
    }
}
