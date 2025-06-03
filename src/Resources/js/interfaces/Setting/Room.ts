import { EmployeeList } from "../EmployeeManagement/Employee";
import { BuildingList } from "./Building";
import { ClassRoomList } from "./ClassRoom";

export interface ViewRoom{
    id?: number | null;
    name: string;
    name_spell: string | null;
    floor: number;
    is_supplier: boolean | null;
    phone: string | null;
    building: BuildingList | null;
    current?: boolean | null;
    class_room_id : number | null;
    class_room : ClassRoomList | null; 
    created_at?: string;
    updated_at?: string;
}

export interface ShowRoom extends ViewRoom{
}

export interface Room{
    id: number | null;
    name: string;
    floor: string | null;
    is_supplier: boolean | null;
    phone: string | null;
    medic_service_id: number | null;
    class_room_id: number | null;
    building_id: number;
    employees: Array<EmployeeList> | null;
}