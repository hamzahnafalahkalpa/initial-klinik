import { z } from "zod";
import { Employee } from "@projects/klinik/src/Resources/js/interfaces/EmployeeManagement/Employee";
import { CardIdentitySchema } from "./CardIdentitySchema";
import { PeopleSchema } from "../People/PeopleSchema";
import { UserReferenceSchema } from "../User/UserReferenceSchema";

const RawEmployeeSchema: z.ZodType<Employee> = z.lazy(() =>
  z.object({
    id: z.string().nullable(),
    card_identity: CardIdentitySchema,
    employee_type_id: z.number().nullable(),
    profession_id: z.number().nullable(),
    occupation_id: z.number(),
    hired_at: z.string(),
    people: PeopleSchema,
    user_reference: UserReferenceSchema,
    profile: z.unknown().nullable(),
  })
);

export const EmployeeSchema = RawEmployeeSchema;

