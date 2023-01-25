import apiUrl from './apiUrl';
import { CheckedRoom } from '../models/Rooms';

const fetchCheckedRooms = async (roomsIds: Array<number>): Promise<Array<CheckedRoom | null>> => {
  const checkedRooms: Array<Promise<CheckedRoom | null>> = [];

  roomsIds.forEach(async (roomId: number) => {
    checkedRooms.push(fetchCheckedRoom(roomId));
  });
  return await Promise.all(checkedRooms);
};

const fetchCheckedRoom = async (roomId: number): Promise<CheckedRoom | null> => {
  const checkedRoomURL: string = `${apiUrl}room/${roomId}`;

  const checkedRoom: Response = await fetch(checkedRoomURL);
  if (!checkedRoom.ok) {
    throw new Error(`The url ${checkedRoom} cannot response properly`);
  } else if (checkedRoom.ok) {
    return Object.assign({ id: roomId }, await checkedRoom.json());
  }

  return null;
};

export default fetchCheckedRooms;
