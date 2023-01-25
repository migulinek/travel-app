<?php

namespace App\RoomsFactory;

use stdClass;

class CheckedRoomFactory
{
    static public function setCheckedRoom(string $availabilityStatus, int $price = null, string $currency = null)
    {
        $checkedRoom = new stdClass();
        $checkedRoom->availabilityStatus = $availabilityStatus;
        if ($price === null) {
            $checkedRoom->price = null;
            return $checkedRoom;
        }
        $checkedRoom->price = new stdClass();
        $checkedRoom->price->value = $price;
        $checkedRoom->price->currencyCode = $currency;
        return $checkedRoom;
    }
}
