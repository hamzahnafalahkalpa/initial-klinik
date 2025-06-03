import { z } from "zod";
import { PeopleFamily } from "../../interfaces/People/People";

const RawFamilySchema: z.ZodType<PeopleFamily> = z.object({
    people_id: z.string().nullable(),
    role: z.string().nullable(),
    name: z.string().nullable(),
    phone: z.string().nullable(),
})

export const FamilySchema = RawFamilySchema;
