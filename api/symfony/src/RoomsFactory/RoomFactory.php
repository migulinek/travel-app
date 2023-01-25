<?php

namespace App\RoomsFactory;

use stdClass;

class RoomFactory
{
    static public function setRoom(int $id, string $name, int $price, string $currency)
    {
        $room = new stdClass();
        $room->id = $id;
        $room->name = $name;
        $room->price = new stdClass();
        $room->price->value = $price;
        $room->price->currencyCode = $currency;
        return $room;
    }
}
