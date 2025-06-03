import { z } from "zod";
import { AddressSchema as RegionalAddressSchema } from "../Regional/AddressSchema";
import { PeopleAddress } from "../../interfaces/People/People";

const RawAddressSchema: z.ZodType<PeopleAddress> = z.object({
    residence_same_as_ktp: z.boolean().optional().default(false),
    ktp: RegionalAddressSchema,
    residence: RegionalAddressSchema
})

export const AddressSchema = RawAddressSchema;
