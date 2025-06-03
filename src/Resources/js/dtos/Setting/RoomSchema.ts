import { z } from "zod";
import { Room } from "@klinik/interfaces/Setting/Room";
import { EmployeeListSchema } from "../EmployeeManagement/EmployeeListSchema";

const RawRoomSchema: z.ZodType<Room> = z.object({
    id: z.number().int().nullable(),
    name: z.string(),
    floor: z.string().nullable(),
    is_supplier: z.boolean().nullable(),
    phone: z.string().nullable(),
    medic_service_id: z.number().int().nullable(),
    class_room_id: z.number().int().nullable(),
    building_id: z.number().int(),
    employees: z.array(
      EmployeeListSchema
    ).nullable()
});

export const RoomSchema = RawRoomSchema;

