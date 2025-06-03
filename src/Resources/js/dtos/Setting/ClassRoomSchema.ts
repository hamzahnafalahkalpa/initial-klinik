import { z } from "zod";
import { ClassRoom } from "@klinik/interfaces/Setting/ClassRoom";

const RawClassRoomSchema: z.ZodType<ClassRoom> = z.object({
  id: z.number().nullable(),
  name: z.string(),
});

export const ClassRoomSchema = RawClassRoomSchema;

