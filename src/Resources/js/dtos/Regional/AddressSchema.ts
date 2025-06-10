import { z } from "zod";
import { Address } from "../../interfaces/Regional/Address";

const RawAddressSchema: z.ZodType<Address> = z.object({
  id: z.string().nullable().optional(),
  name: z.string(),
  pos_code: z.string().nullable().optional(),
  rt: z.string().nullable().optional(),
  rw: z.string().nullable().optional(),
  village_id: z.number().nullable().optional(),
  province_id: z.number().nullable().optional(),
  district_id: z.number().nullable().optional(),
  subdistrict_id: z.number().nullable().optional()
})

export const AddressSchema = RawAddressSchema;
