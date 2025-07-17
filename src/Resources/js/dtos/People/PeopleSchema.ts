import { z } from "zod";
import { EnumBloodType, EnumGender, EnumMaritalStatus, People } from "../../interfaces/People/People";
import { AddressSchema } from "./AddressSchema";
import { CardIdentitySchema } from "./CardIdentitySchema";
import { FamilySchema } from "./FamilyRelationshipSchema";

const RawPeopleSchema: z.ZodType<People> = z.lazy(() =>
  z.object({
    id: z.string().nullable(),
    name: z.string(),
    sex: z.nativeEnum(EnumGender).nullable(),
    dob: z.string(),
    pob: z.string(),
    last_education: z.nullable(z.number()),
    father_name: z.string().nullable(),
    mother_name: z.string().nullable(),
    blood_type: z.nativeEnum(EnumBloodType).nullable(),
    marital_status: z.nativeEnum(EnumMaritalStatus).nullable(),
    total_children: z.number(),
    country_id: z.number().nullable(),
    address: AddressSchema,
    card_identity: CardIdentitySchema,
    family_relationship: FamilySchema,
    phones: z.array(z.string()),
  })
);

export const PeopleSchema = RawPeopleSchema;

