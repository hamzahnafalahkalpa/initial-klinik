import { ServiceList } from "../Service/Service";

export interface ViewClassRoom{
    id?: number | null;
    name: string;
    service_id : string | null;
    service    : ServiceList | null;
    created_at?: string;
    updated_at?: string;
}

export interface ShowClassRoom extends ViewClassRoom{
}

export interface ClassRoomList {
    id?: number | null;
    name: string;
}

export interface ClassRoom {
}