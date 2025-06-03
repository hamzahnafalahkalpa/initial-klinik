import { z } from "zod";
import { Building } from "@klinik/interfaces/Setting/Building";

const RawBuildingSchema: z.ZodType<Building> = z.object({
  id: z.number().optional().nullable().default(null),
  name: z.string({
    required_error: "Building name is required",
    invalid_type_error: "Building name must be a string",
  }),
}); 

export const BuildingSchema = RawBuildingSchema;