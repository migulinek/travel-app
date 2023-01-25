<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\RoomsFactory\RoomFactory;


class RoomsController extends AbstractController
{
    #[Route('/rooms')]
    public function index(): Response
    {
        return $this->json(
            $this->getFakeRooms(),
            headers: ['Content-Type' => 'application/json;charset=UTF-8']
        );
    }

    private function getFakeRooms()
    {
        return array(
            RoomFactory::setRoom(1, "Standard Double Room with a Sea View", 23990, "CZK"),
            RoomFactory::setRoom(2, "Standard Double Room", 19990, "CZK"),
            RoomFactory::setRoom(4, "Two Bedroom Apartment", 41690, "CZK"),
            RoomFactory::setRoom(3, "Luxury Double Room", 29990, "CZK"),
        );
    }
}
