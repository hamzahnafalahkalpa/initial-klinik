import { z } from "zod";
import { Building } from "@klinik/interfaces/Setting/Building";

const RawBuildingSchema: z.ZodType<Building> = z.object({
  id: z.number().optional().nullable().default(null),
  name: z.string({
    required_error: "Nama gedung harus diisi",
    invalid_type_error: "Nama gedung harus berupa string",
  }),
}); 

export const BuildingSchema = RawBuildingSchema;