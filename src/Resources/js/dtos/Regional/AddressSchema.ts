import { z } from "zod";
import { Address } from "../../interfaces/Regional/Address";

const RawAddressSchema: z.ZodType<Address> = z.object({
  id: z.number().nullable(),
  name: z.string(),
  province_id: z.number().nullable(),
  district_id: z.number().nullable(),
  subdistrict_id: z.number().nullable(),
  village_id: z.number().nullable(),
})

export const AddressSchema = RawAddressSchema;
